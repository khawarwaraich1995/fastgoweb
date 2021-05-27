<?php

namespace App\Http\Controllers;

use App\Catagories;
use Exception;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Catagories::latest('id')->get();
        return view('categories.categories_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.categories_form');
    }

    public function edit($id)
    {
        $data['categories_data'] = Catagories::find($id);
        return view('categories.categories_form', $data);
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
        $data['description'] = $request->description;
        $data['charges'] = $request->charges;
        $data['charges_type'] = $request->charges_type;
        $data['status'] = 1;
        if (isset($update_id) && !empty($update_id) && $update_id != 0) {
            try {
                $update = Catagories::where('id', $update_id)
                    ->update($data);
                $categories_data = Catagories::find($update_id);
                if ($_FILES['image']['size'] > 0) {
                    $file = $request->file('image');
                    if (isset($categories_data->image) && !empty($categories_data->image)) {
                        delete_images_by_name(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $categories_data->image);
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','catagories');
                    } else {
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','catagories');
                    }
                }
                return redirect('/ride/categories')->with('success', 'Category Updated successfully!');
            } catch (\Illuminate\Database\QueryException $ex) {
                dd($ex->getMessage());
            }
        } else {
            try {
                $insert = Catagories::create($data);
                if (isset($_FILES['image']['size'])) {
                    if ($_FILES['image']['size'] > 0) {
                        $file = $request->file('image');
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $insert->id, 'image','catagories');
                    }
                }
                return redirect('/ride/categories')->with('success', 'Category added successfully!');
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
    public function show(Catagories $catagories)
    {
        //
    }

    public function update(Request $request, Catagories $catagories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagories  $catagories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagories $catagories)
    {
        $step = Catagories::find($id);
        $step->delete();
        return redirect()->back();
    }
}
