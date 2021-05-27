<?php

namespace App\Http\Controllers;

use App\SettingsRide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class RideSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsRide::all();
        $data['settings'] = $settings[0] ?? '';
        return view('settings-ride.manage', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
            $id = $request->id;
            $data = $request->all();
            $data['enable_stripe'] = isset($request->enable_stripe) ? 1 : 0;
            $data['cod'] = isset($request->cod) ? 1 : 0;
            $settings = SettingsRide::updateOrCreate(['id' => $id], $data);
            if ($_FILES['rs_image']['size'] > 0) {
                $file = $request->file('rs_image');
                if (isset($settings->rs_image) && !empty($settings->rs_image)) {
                    delete_images_by_name(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $settings->rs_image);
                    upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $settings->id, 'rs_image','settings_rides');
                } else {
                    upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $settings->id, 'rs_image','settings_rides');
                }
            }
            if($settings->id > 0)
            {
                return redirect()->back()->with('success', 'Settings Updated successfully!');
            }

    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
