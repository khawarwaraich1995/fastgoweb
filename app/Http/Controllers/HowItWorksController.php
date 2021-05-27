<?php

namespace App\Http\Controllers;

use App\HowItWorks;
use Exception;
use Illuminate\Http\Request;

class HowItWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = HowItWorks::latest('id')->get();
        return view('works.categories_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.categories_form');
    }

    public function edit($id)
    {
        $data['categories_data'] = HowItWorks::find($id);
        return view('works.categories_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_id = $request->id;
        $data['name'] = $request->name;
        $data['status'] = 1;
        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            try {
                $update = HowItWorks::where('id', $update_id)
                    ->update($data);
                $categories_data = HowItWorks::find($update_id);
                if ($_FILES['image']['size'] > 0) {
                    $file = $request->file('image');
                    if (isset($categories_data->image) && !empty($categories_data->image)) {
                        delete_images_by_name(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $categories_data->image);
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','how_it_works');
                    } else {
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','how_it_works');
                    }
                }
                return redirect('/works')->with('success', 'Step Updated successfully!');
            } catch (\Illuminate\Database\QueryException $ex) {
                dd($ex->getMessage());
            }
        } else {
            try {
                $insert = HowItWorks::create($data);
                if (isset($_FILES['image']['size'])) {
                    if ($_FILES['image']['size'] > 0) {
                        $file = $request->file('image');
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $insert->id, 'image','how_it_works');
                    }
                }
                return redirect('/works')->with('success', 'Step added successfully!');
            } catch (\Illuminate\Database\QueryException $ex) {
                dd($ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catagories  $catagories
     * @return \Illuminate\Http\Response
     */
    public function show(HowItWorks $catagories)
    {
        //
    }

    public function update(Request $request, HowItWorks $catagories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagories  $catagories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $step = HowItWorks::find($id);
       $step->delete();
       return redirect()->back();
    }
}
