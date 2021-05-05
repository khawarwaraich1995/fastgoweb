<?php

namespace App\Http\Controllers\API\Client;

class SettingsController
{
    public function index()
    {
            return response()->json([
                'data' => [
                    'app_name'=>config('app.name'),
                    'single_mode'=>config('settings.single_mode'),
                    'single_mode_id'=>config('settings.single_mode_id'),
                    'single_mode_name'=>config('app.name'),
                    'multi_city'=>config('settings.multi_city'),
                    'currency'=>config('settings.cashier_currency'),
                    'currency_sign'=>currency(config('settings.cashier_currency')),
                    'enable_cod'=>!config('settings.hide_cod'),
                    'enable_stripe'=>config('settings.enable_stripe'),
                    'stripe_publish_key'=>config('settings.stripe_key'),
                    'onesignal_android_app_id'=>config('settings.onesignal_android_app_id'),
                    'onesignal_ios_app_id'=>config('settings.onesignal_ios_app_id'),
                    'google_api_key'=>config('settings.google_maps_api_key'),
                    'driver_percent_from_deliver'=>config('driver_percent_from_deliver',100)
                ],
                'status' => true,
                'errMsg' => '',
            ]);
    }
    
}
