<?php

namespace Modules\Payfast\Http\Controllers;

require __DIR__.'/../../vendor/autoload.php';

use Illuminate\Routing\Controller;
use App\Order;
use PayFast\PayFastPayment;



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
        $merchantId=config('payfast.merchantId',"");
        $merchantKey=config('payfast.merchantKey',"");
        $mode=config('payfast.mode',"");

        //Setup based on vendor
        if(config('payfast.useVendor')){
            $merchantId=$this->vendor->getConfig('payfast_merchantId','');
            $merchantKey=$this->vendor->getConfig('payfast_merchantKey','');
            $mode=$this->vendor->getConfig('payfast_mode','');
        }

        try {
            $payfast = new PayFastPayment(
                [
                    'merchantId' => $merchantId,
                    'merchantKey' => $merchantKey,
                    'passPhrase' => '',
                    'testMode' => $mode=="sandbox",
                    'notify_url' => route('payfast.notify'),
                    'cancel_url' => route('payfast.pay', ['order' => $order]),
                    'return_url' => route('order.success', ['order' => $order]),
                ]
            );
        
            $data = [
                'amount' => $totalValue,
                'item_name' => 'Order#'.$order->id,
                'm_payment_id'=>$order->id
            ];
        
            // Generate payment identifier
            $identifier = $payfast->onsite->generatePaymentIdentifier($data);
        
            if($identifier!== null){
                return view('payfast::pay',['identifier'=>$identifier,'order'=>$order]);
            }
        } catch(Exception $e) {
            echo 'There was an exception: '.$e->getMessage();
        }
    }

    public function notify(){
        $order=Order::findOrFail($_GET['m_payment_id']);
        if($_GET['payment_status']=="COMPLETE"){
            $order->payment_status = 'paid';
            $order->update();
        }
    }
}
