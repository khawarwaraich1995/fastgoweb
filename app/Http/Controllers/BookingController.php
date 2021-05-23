<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use Exception;
use Validator;
use Stripe;
use OneSignal;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['bookings'] = Booking::orderBy('id', 'DESC')
            ->get();
        return view('bookings.booking_order', $data);
    }


    public function checkout(Request $request)
    {
        $cat_id = $request->token;
        if (isset($cat_id) && !empty($cat_id)) {
            $data['category'] = Catagories::find($cat_id);
            return view('checkout', $data);
        }
    }

    public function orderDetail($id)
    {
        $data['booking'] = Booking::find($id);
        return view('bookings.order_detail', $data);
    }

    public function assignRider(Request $request){
        $order_id = $request->order_id;
        $rider_id = $request->rider_id;
        if(isset($order_id) && !empty($order_id) && isset($rider_id) && !empty($rider_id))
        {
            $order = Booking::where('id', $order_id)->update(['driver_id' => $rider_id, 'order_status' => 'assigned']);
            return response()->json(['status' => true, 'message' => "Order is assigned to Rider"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookRide(Request $request)
    {

        $order_data = json_decode($request->booking_arr);
        $order_data = $order_data[0];
        if (isset($order_data) && !empty($order_data)) {
            $data['customer_id'] = auth()->user()->id;
            $data['from_location'] = $order_data->start;
            $data['to_location'] = $order_data->end;
            $data['order_total'] = $order_data->order_amount;
            $data['full_name'] = auth()->user()->name;
            $data['email'] = auth()->user()->email;
            $data['phone'] = auth()->user()->phone;
            $data['pickup_time'] = $order_data->schedule_datetime;
            $data['payment_method'] = $order_data->payment_method;
            $data['payment_status'] = 0;
            $book = Booking::create($data);
            if (isset($book->id) && $book->id > 0) {
                if($order_data->payment_method == 'cash'){
                    $message = "Your ride is booked successfully you will get confirmation email";
                    return response()->json(['status' => true, 'message' => $message, 'id' => $book->id], 200);
                }
                
            }
            // if (isset($book->id) && $book->id > 0) {
            //     $url = BASE_URL.'/stripe-checkout/'.$data['full_name'].'/'.$book->id.'/'. $data['order_total'];
            //     return redirect($url);
            // }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function appBooking(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'order_data' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()]);
        }
        $order_data = json_decode($request->order_data);
        if (isset($order_data) && !empty($order_data)) {
            $data['category_id'] = $order_data->category_id;
            $data['customer_id'] = $order_data->customer_id;
            $data['from_location'] = $order_data->start;
            $data['to_location'] = $order_data->end;
            $data['order_total'] = $order_data->order_amount;
            $data['full_name'] = $order_data->full_name;
            $data['email'] = $order_data->email;
            $data['phone'] = $order_data->phone;
            $data['pickup_time'] = $order_data->pickup_time;
            $data['transaction_no'] = $order_data->transaction_no;
            $data['note'] = $order_data->note;
            $data['payment_status'] = 0;
            $book = Booking::create($data);
            if (isset($book->id) && $book->id > 0) {
                return response()->json(['status' => true, 'id' => $book->id, 'amount' => $data['order_total'], 'name' => $data['full_name']], 200);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    function stripe_checkout(Request $request)
    {
        $id = $request->id;
        $amount= $request->amount;
        $name = $request->name;
        Stripe\Stripe::setApiKey('sk_test_qEfwJQ0N3JbFMBepdcv4Libs00mf3GpKYG');

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'name' => $name,
                        'currency' => "USD",
                        'amount' =>  $amount * 100,
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/payment-success?order_id=' . $id,
                'cancel_url' => 'http://127.0.0.1:8000/payment-error?order_id=' . $id,
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        $data['session_id'] = $session->id;
        $data['stripe_publish_key'] = 'pk_test_0D5LVcQH8brCqqfXO5CXQdlK00T4XHtCV0';
        return view('payment.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function payment_success(Request $request)
    {
        $order_id = $request->orderID;
        if (isset($order_id) && $order_id > 0) {
            $order = Booking::find($order_id);
            $order->payment_status = 1;
            $order->save();
            $message = "Your Order# ".$order->id." is placed successfully. You will receive confirmation shortly.";
            // if(isset($customer->device_token) && !empty($customer->device_token))
            // {
            //     $notification_message = "Your Order# ".$order->id." is placed successfully. You will receive confirmation shortly.";
            //     $notify = $this->send_notification($customer->device_token, $notification_message);
            // }
            return view('success', compact('order_id', 'message'));
        }
    }

    public function payment_error(Request $request)
    {
        $order_id = $request->order_id;
        if (isset($order_id) && $order_id > 0) {
            $order = Booking::find($order_id);
            $customer = User::find($order->customer_id);
            if(isset($customer->device_token) && !empty($customer->device_token))
            {
                $notification_message = "Your Order# ".$order->id." is rejected due to payment processing issue.";
                $notify = $this->send_notification($customer->device_token, $notification_message);
            }
            return view('payment.error', compact('order_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function change_status(Request $request)
    {
        $order_id = $request->order_id;
        $status = $request->status;
        $order = Booking::find($order_id);
        if($order->first())
        {
            $order->order_status = $status;
            $order->save();
            $customer = User::find($order->customer_id);
            if($customer->device_token != null)
            {
                if($status == "accepted")
                {
                    $notification_message = "Your Order# ".$order->id." is accepted shortly your order will be dispatched.";
                }elseif($status == "rejected")
                {
                    $notification_message = "Your Order# ".$order->id." is rejected. Check your order details fo more information.";
                }
                $notify = $this->send_notification($customer->device_token, $notification_message);
            }
            return response()->json(['status' => true, 'message' => "Order Status updated"], 200);
        }else{
            return response()->json(['status' => false, 'message' => "Order not found"], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function send_notification($device_token, $notification_message)
    {
        try{
           $notify =  OneSignal::sendNotificationToUser(
                $notification_message,
                $device_token,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
            return $notify;
        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
