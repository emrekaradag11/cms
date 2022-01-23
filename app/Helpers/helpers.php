<?php

if (! function_exists('fileUpload')) {
    function fileUpload($img,$path,$newName,$oldImage)
    {
        if(!isset($path))
            $path = 'uploads';

        if(isset($oldImage) && file_exists(public_path($path . '\\' . $oldImage)) && !empty(trim($oldImage)))
            unlink(public_path($path . '\\' . $oldImage));

        $imageName = Str::slug($newName) . '_' . uniqid();
        $img_type = explode('.',$img->getClientOriginalName());
        $upload_name = $imageName.'.'.end($img_type);
        $move = $img->move(public_path($path),$upload_name);
        if($move){
            return $upload_name;
        }
    }
}

if (! function_exists('deleteImg')) {
    function deleteImg($img, $path = 'uploads')
    {
        $deleted = unlink(public_path($path . '/' . $img));
        if($deleted)
            return true;
        else
            return false;
    }
}
 
