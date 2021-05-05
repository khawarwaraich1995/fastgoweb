<?php

namespace Modules\Razorpay\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class App 
{
    private $order;
    private $vendor;

    public function __construct($order, $vendor) {
        
        $this->order=$order;
        $this->vendor=$vendor;

    }

    public function execute(){
         //Set payment link in order
         $this->order->payment_link=route('razorpay.pay',['order'=>$this->order->id]);
         $this->order->update();

         //All ok
         return Validator::make([], []);
    }
}