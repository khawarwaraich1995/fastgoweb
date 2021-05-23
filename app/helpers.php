<?php

use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

function upload_images($orignal_path,$large_path,$medium_path,$small_path,$request_file, $id, $table_field, $table_name)
{

    $file_name = $request_file->getClientOriginalName();
    $file_name = pathinfo($file_name,PATHINFO_FILENAME);
    $file_extension = $request_file->getClientOriginalExtension();
    $file_name = $id . '_' . $file_name . "." . $file_extension;

    //Orignal Image Path
    createDirecrtory(public_path().$orignal_path);
    $request_file->move(public_path().$orignal_path, $file_name);

    //Compressed Original
    $cmp_img = Image::make(public_path().$orignal_path.$file_name);
    $cmp_img->save(public_path().$orignal_path.$file_name, 50);

    //Large Size Image Path
    $lg_img = Image::make(public_path().$orignal_path.$file_name);
    $lg_img->resize(500, 450);
    createDirecrtory(public_path().$large_path);
    $lg_img->save(public_path().$large_path.$file_name, 70);

    //Medium Size Image Path
    $md_img = Image::make(public_path().$orignal_path.$file_name);
    $md_img->resize(250, 200);
    createDirecrtory(public_path().$medium_path);
    $md_img->save(public_path().$medium_path.$file_name, 70);
    
    //Small Size Image Path
    $sm_img = Image::make(public_path().$orignal_path.$file_name);
    $sm_img->resize(150, 100);
    createDirecrtory(public_path().$small_path);
    $sm_img->save(public_path().$small_path.$file_name, 70);


    update_data($table_name, $table_field, $file_name, $id);
}

function update_data($table_name, $table_field, $file_name, $id)
{
  DB::table($table_name)->where('id', $id)->update([$table_field => $file_name]);
}

function createDirecrtory($path)
{
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
}
function delete_images_by_name($orignal_path, $large_path, $medium_path, $small_path, $file_name)
{
    
        if (File::exists(public_path().$orignal_path.$file_name))
        {
            unlink(public_path().$orignal_path.$file_name);
        }
        if (File::exists(public_path().$large_path.$file_name))
        {
            unlink(public_path().$large_path.$file_name);
        }
        if (File::exists(public_path().$medium_path.$file_name))
        {
            unlink(public_path().$medium_path.$file_name);
        }
        if (File::exists(public_path().$small_path.$file_name))
        {
            unlink(public_path().$small_path.$file_name);
        }

}
