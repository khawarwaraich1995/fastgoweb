<?php

namespace App;

use App\MyModel;
use App\Traits\HasConfig;
use willvincent\Rateable\Rateable;
use Spatie\OpeningHours\OpeningHours;

class Restorant extends MyModel
{
    use Rateable;
    use HasConfig;

    protected $modelName="App\Restorant";
    protected $fillable = ['name', 'subdomain', 'user_id', 'lat', 'lng', 'address', 'phone', 'logo', 'description', 'city_id'];
    protected $appends = ['alias', 'logom', 'icon', 'coverm'];
    protected $imagePath = '/uploads/restorants/';

    protected $casts = [
        'radius' => 'array',
    ];

    protected $attributes = [
        'radius' => '{}',
    ];

    /**
     * Get the user that owns the restorant.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getAliasAttribute()
    {
        return $this->subdomain;
    }

    public function getLinkAttribute()
    {
        if (config('settings.wildcard_domain_ready')){
            //As subdomain
            return (isset($_SERVER['HTTPS'])&&$_SERVER["HTTPS"] ?"https://":"http://").$this->subdomain.".".str_replace($this->subdomain.".","",str_replace("www.","",$_SERVER['HTTP_HOST']));
        }else{
            //As link
            return route('vendor',$this->subdomain);
        }
    }

    public function getLogomAttribute()
    {
        return $this->getImge($this->logo, config('global.restorant_details_image'));
    }

    public function getIconAttribute()
    {
        return $this->getImge($this->logo, str_replace('_large.jpg', '_thumbnail.jpg', config('global.restorant_details_image')), '_thumbnail.jpg');
    }

    public function getCovermAttribute()
    {
        return $this->getImge($this->cover, config('global.restorant_details_cover_image'), '_cover.jpg');
    }

    public function categories()
    {
        return $this->hasMany(\App\Categories::class, 'restorant_id', 'id')->where(['categories.active' => 1])->ordered();
    }

    public function localmenus()
    {
        return $this->hasMany(\App\Models\LocalMenu::class, 'restaurant_id', 'id');
    }

    public function hours()
    {
        return $this->hasMany(\App\Hours::class, 'restorant_id', 'id');
    }

    public function getBusinessHours(){

        $creationArray=[
            'monday'     => [],
            'tuesday'    => [],
            'wednesday'  => [],
            'thursday'   => [],
            'friday'     => [],
            'saturday'   => [],
            'sunday'     => [],
            'overflow' => true
        ];

        $dayKeys=array_keys($creationArray);
        
        //Get all working hours
        $workingHours=$this->hours()->get()->toArray();

        foreach ($workingHours as $key => $shift) {
            for ($i = 0; $i < 7; $i++) {
                $from = $i.'_from';
                $to = $i.'_to';
                if($shift[$from]&&$shift[$to]){
                    $toHour=date("H:i", strtotime($shift[$to]));
                    /*if($toHour=="23:59"){
                        $toHour=="00:00";
                       
                    }*/
                    array_push($creationArray[$dayKeys[$i]],date("H:i", strtotime($shift[$from]))."-".$toHour);
                }
                
            }
        }
        
        //Set config based on restaurant
        config(['app.timezone' => $this->getConfig('time_zone',config('app.timezone'))]);


        $tz= $this->getConfig('time_zone',config('app.timezone'));
        //dd($creationArray);


        $mergedRanges = OpeningHours::mergeOverlappingRanges($creationArray);

        //Get all working hours
        return OpeningHours::create($mergedRanges,$tz);
    }

    public function tables()
    {
        return $this->hasMany(\App\Tables::class, 'restaurant_id', 'id');
    }

    public function areas()
    {
        return $this->hasMany(\App\RestoArea::class, 'restaurant_id', 'id');
    }

    public function visits()
    {
        return $this->hasMany(\App\Visit::class, 'restaurant_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(\App\Order::class, 'restorant_id', 'id');
    }

    public function coupons()
    {
        return $this->hasMany(\App\Coupons::class, 'restaurant_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function (self $restaurant) {
            if (config('settings.is_demo')) {
                return false; //In demo disable deleting
            } else {
                //Delete orders
                foreach ($restaurant->orders()->get() as $order) {
                    //Delete Order items
                    //Delete Oders statuses
                    $order->delete();
                }

                //Delete Categories
                foreach ($restaurant->categories()->get() as $category) {
                    $category->delete();
                    //Delete items
                        //Delete extras
                        //Delete Options
                        //Deletee Options
                }

                //Delete Hours
                $restaurant->hours()->forceDelete();

                //Delete Tables
                $restaurant->tables()->forceDelete();

                //Delete Restoareas
                $restaurant->areas()->forceDelete();

                //Delete Visits to this restaruant
                $restaurant->visits()->forceDelete();

                //Delete Local menus
                $restaurant->localmenus()->forceDelete();

                return true;
            }
        });
    }
}
