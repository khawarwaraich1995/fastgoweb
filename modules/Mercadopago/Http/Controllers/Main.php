<?php

namespace Modules\Mercadopago\Http\Controllers;

require __DIR__.'/../../vendor/autoload.php';

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\SDK;

class Main extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pay($order)
    {
        $order=Order::findOrFail($order);
        $totalValue=$order->order_price+$order->delivery_price;

        //GET THE KEY
        //System setup 
        $access_token=config('mercadopago.access_token',"");

        //Setup based on vendor
        if(config('mercadopago.useVendor')){
            $access_token=$order->restorant->getConfig('mercadopago_access_token','');
        }

        // Agrega credenciales
        SDK::setAccessToken($access_token);

        
       
        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = 'Pedido #'.$order->id;
        $item->quantity = 1;
        $item->unit_price = $totalValue;
        $preference->items = array($item);
        $preference->external_reference=$order->id;

        $preference->back_urls = array(
            "success" => route('mercadopago.execute','success'),
            "failure" => route('mercadopago.execute','failure'),
            "pending" => route('mercadopago.execute','pending')
        );
        $preference->auto_return = "approved";


        $preference->save();

        //OR
        return redirect($preference->init_point);

        //OR
       // return view('mercadopago::pay',['preference_id'=>$preference->id,'order'=>$order]);
    }

    public function executePayment($status){
        

        $order=Order::findOrFail($_GET['external_reference']);
        if($_GET['status']){
            $order->payment_status = 'paid';
            $order->update();
            return redirect()->route('order.success', ['order' => $order]);
        }else{
            \Session::put('error',__('Payment status:')." ".$_GET['status']);
            return redirect()->route('mercadopago.pay', ['order' => $order->id]);
        }

        

        
        
    }

  
}
