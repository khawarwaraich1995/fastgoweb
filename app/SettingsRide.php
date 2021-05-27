<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsRide extends Model
{
    protected $fillable = [
        'cod','default_payment_type', 'location_search_radius', 'stripe_currecny', 'rs_image', 'rs_title', 'rs_desc',
        'enable_stripe', 'stripe_key', 'secret_key', 'updated_at', 'currency',
    ];
}
