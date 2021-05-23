<?php

namespace App;

use App\Catagories;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id', 'from_location', 'to_location','full_name', 'email', 'phone','pickup_time', 'order_total',
        'payment_status', 'order_status', 'payment_method'

    ];
}

