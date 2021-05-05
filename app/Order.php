<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasConfig;

class Order extends Model
{
    use HasFactory;
    use HasConfig;

    protected $modelName="App\Order";

    protected $table = 'orders';

    protected $appends = ['time_formated','last_status','is_prepared','actions'];

    protected $fillable = ['fee', 'fee_value', 'static_fee', 'vatvalue','payment_info','mollie_payment_key','whatsapp_phone'];

    public function restorant()
    {
        return $this->belongsTo(\App\Restorant::class);
    }

    public function driver()
    {
        return $this->hasOne(\App\User::class, 'id', 'driver_id');
    }

    public function table()
    {
        return $this->hasOne(\App\Tables::class, 'id', 'table_id');
    }

    public function address()
    {
        return $this->hasOne(\App\Address::class, 'id', 'address_id');
    }

    public function client()
    {
        return $this->hasOne(\App\User::class, 'id', 'client_id');
    }

    public function status()
    {
        return $this->belongsToMany(\App\Status::class, 'order_has_status', 'order_id', 'status_id')->withPivot('user_id', 'created_at', 'comment')->orderBy('order_has_status.id', 'ASC');
    }

    public function laststatus()
    {
        return $this->belongsToMany(\App\Status::class, 'order_has_status', 'order_id', 'status_id')->withPivot('user_id', 'created_at', 'comment')->orderBy('order_has_status.id', 'DESC')->limit(1);
    }

    

    public function getLastStatusAttribute()
    {
        return $this->belongsToMany(\App\Status::class, 'order_has_status', 'order_id', 'status_id')->withPivot('user_id', 'created_at', 'comment')->orderBy('order_has_status.id', 'DESC')->limit(1)->get();
    }

    public function getIsPreparedAttribute()
    {
        return $this->belongsToMany(\App\Status::class, 'order_has_status', 'order_id', 'status_id')->where('status_id',5)->count()==1;
    }

    public function getExpeditionType(){
        //FT
        $delivery="";
        if(config('app.isft')){
            $delivery=$this->delivery_method==1?__('Delivery'):__('Pickup');
        }
        //QR or WP
        if(config('app.isqrsaas')){
            if(config('settings.is_whatsapp_ordering_mode')){
                //WP
                $delivery=$this->delivery_method==1?__('Delivery'):__('Pickup');
            }else{
                //QR
                $delivery=$this->delivery_method==3?__('Dine in'):__('Takeaway');
            }
        }

        return $delivery;
        
    }

    public function stakeholders()
    {
        return $this->belongsToMany(\App\User::class, 'order_has_status', 'order_id', 'user_id')->withPivot('status_id', 'created_at', 'comment')->orderBy('order_has_status.id', 'ASC');
    }

    public function items()
    {
        return $this->belongsToMany(\App\Items::class, 'order_has_items', 'order_id', 'item_id')->withPivot(['qty', 'extras', 'vat', 'vatvalue', 'variant_price', 'variant_name']);
    }

    public function ratings()
    {
        return $this->belongsToMany(\App\Ratings::class, 'ratings', 'order_id', 'id');
    }

    public function getSocialMessageAttribute($encode=false){
        $message = view('messages.social', ['order' => $this])->render();
        $message=str_replace('&#039;',"'",$message);
        if($encode){
            $message= urlencode($message);
            return $message;
        }
        return $message;
    }

    public function getTimeFormatedAttribute()
    {
        $parts = explode('_', $this->delivery_pickup_interval);
        if (count($parts) < 2) {
            return '';
        }

        $hoursFrom = (int) (($parts[0] / 60).'');
        $minutesFrom = $parts[0] - ($hoursFrom * 60);

        $hoursTo = (int) (($parts[1] / 60).'');
        $minutesTo = $parts[1] - ($hoursTo * 60);

        $format = 'G:i';
        if (config('settings.time_format') == 'AM/PM') {
            $format = 'g:i A';
        }
        $from = date($format, strtotime($hoursFrom.':'.$minutesFrom));
        $to = date($format, strtotime($hoursTo.':'.$minutesTo));

        return $from.' - '.$to;
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function (self $order) {
            //Delete Order items
            $order->items()->detach();
            
            //Delete Oders statuses
            $order->status()->detach();

            //Delete Oders ratings
            $order->ratings()->detach();

            return true;
        });
    }


    public function getActionsAttribute(){
        //Find the current user role
        if(!auth()->user()){
            return ["buttons"=>[],'message'=>__('No actions for you right now!')];
        }
        else if (auth()->user()->hasRole('client')) {
            return ["buttons"=>[],'message'=>__('No actions for you right now!')];
        }else if (auth()->user()->hasRole('admin')) {
            return ["buttons"=>[],'message'=>__('No actions for you right now!')];
        }else if (auth()->user()->hasRole('driver')) {
            return $this->getDriverOrderActions();
        }else if (auth()->user()->hasRole('owner')) {
            return $this->getOwnerOrderActions();
        }
    }

    private function getDriverOrderActions(){
        $lastStatusAlias=$this->getLastStatusAttribute()[0]->alias; 
        if(in_array($lastStatusAlias,["assigned_to_driver"])){
            return ["buttons"=>['rejected_by_driver','accepted_by_driver'],'message'=>""];
        }else if(in_array($lastStatusAlias,["prepared"])){
            return ["buttons"=>['picked_up'],'message'=>__('Prepared. You may head up to to venue to pick up.')];
        }else if(in_array($lastStatusAlias,["picked_up"])){
            if($this->payment_status.""=="paid"){
                $message=__('Order is already payed by the client.');
            }else{
                $message=__('Order is not paid yet. Client needs to give you')." ".money($this->order_price+$this->delivery_price,config('settings.cashier_currency'), config('settings.do_convertion'))->format();
            }
            
            return ["buttons"=>['delivered'],'message'=>$message];
        }else if(in_array($lastStatusAlias,["accepted_by_driver"])){
            if($this->getIsPreparedAttribute()){
                //Prepared
                return ["buttons"=>['picked_up'],'message'=>__('Prepared. You may head up to to venue to pick up.')];
            }else{
                //Not yet prepared
                return ["buttons"=>[],'message'=>"At the moment order is in preparing. No action for you at the moment. Based on desired delivery time, you may head up to the venue."];
            }
            
        }else if(in_array($lastStatusAlias,["rejected_by_driver"])){
            return ["buttons"=>[],'message'=>""];
        }
        return ["buttons"=>[],'message'=>__('No actions for you right now!')];
    }

    private function getOwnerOrderActions(){
        $lastStatus=$this->getLastStatusAttribute();
        $lastStatusAlias="just_created";
        if(count($lastStatus)>0){
            $lastStatusAlias=$this->getLastStatusAttribute()[0]->alias;
        }
        if(config('app.isft')){
            if(in_array($lastStatusAlias,["just_created"])){
                return ["buttons"=>[],'message'=>__('Admin will have to approve the order first')];
            }if(in_array($lastStatusAlias,["rejected_by_admin"])){
                return ["buttons"=>[],'message'=>__('Admin have rejected this order')];
            }else if(in_array($lastStatusAlias,["accepted_by_admin"])){
                return ["buttons"=>['rejected_by_restaurant','accepted_by_restaurant'],'message'=>""];
            }else if(in_array($lastStatusAlias,["assigned_to_driver","accepted_by_restaurant","accepted_by_driver","rejected_by_driver"])){
                return ["buttons"=>['prepared'],'message'=>""];
            }else if(in_array($lastStatusAlias,["prepared"])&&config('app.allow_self_deliver')&&$this->delivery_method.""=="2"){
                return ["buttons"=>['delivered'],'message'=>""];
            }
        }else if(config('app.isqrsaas')){
            if(in_array($lastStatusAlias,["just_created","updated"])){
                return ["buttons"=>['rejected_by_restaurant','accepted_by_restaurant'],'message'=>""];
            }else if(in_array($lastStatusAlias,["accepted_by_restaurant"])){
                return ["buttons"=>['prepared'],'message'=>""];
            }else if(in_array($lastStatusAlias,["prepared"])){
                return ["buttons"=>['delivered'],'message'=>""];
            }else if(in_array($lastStatusAlias,["delivered"])){
                return ["buttons"=>['closed'],'message'=>""];
            }
        }
        return ["buttons"=>[],'message'=>__('No actions for you right now!')];
    }
}
