<?php

namespace App\Http\Controllers;

use App\Catagoriesmain;
use Exception;
use Illuminate\Http\Request;

class CatagoriesmainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Catagoriesmain::latest('id')->get();
        return view('categories-main.categories_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories-main.categories_form');
    }

    public function edit($id)
    {
        $data['categories_data'] = Catagoriesmain::find($id);
        return view('categories-main.categories_form', $data);
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
                $update = Catagoriesmain::where('id', $update_id)
                    ->update($data);
                $categories_data = Catagoriesmain::find($update_id);
                if ($_FILES['image']['size'] > 0) {
                    $file = $request->file('image');
                    if (isset($categories_data->image) && !empty($categories_data->image)) {
                        delete_images_by_name(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $categories_data->image);
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','catagoriesmains');
                    } else {
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $categories_data->id, 'image','catagoriesmains');
                    }
                }
                return redirect('/categories-main')->with('success', 'Category Updated successfully!');
            } catch (\Illuminate\Database\QueryException $ex) {
                dd($ex->getMessage());
            }
        } else {
            try {
                $insert = Catagoriesmain::create($data);
                if (isset($_FILES['image']['size'])) {
                    if ($_FILES['image']['size'] > 0) {
                        $file = $request->file('image');
                        upload_images(ORIGNAL_IMAGE_PATH_CATEGORIES, LARGE_IMAGE_PATH_CATEGORIES, MEDIUM_IMAGE_PATH_CATEGORIES, SMALL_IMAGE_PATH_CATEGORIES, $file, $insert->id, 'image','catagoriesmains');
                    }
                }
                return redirect('/categories-main')->with('success', 'Category added successfully!');
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
    public function show(Catagoriesmain $catagories)
    {
        //
    }

    public function update(Request $request, Catagoriesmain $catagories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagories  $catagories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagoriesmain $catagories)
    {
        $step = Catagoriesmain::find($id);
        $step->delete();
        return redirect()->back();
    }
}
