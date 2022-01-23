<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\img;
use Illuminate\Http\Request;

class imageController extends Controller
{
    public function deleteImages(Request $request){
        $img = img::find($request->id);
        $deleted = deleteImg($img->img);

        if($deleted)
            $img->delete();
    }

    public function sortableImage(Request $request){

        if($request->ajax()){
            foreach ($request->post('data') as $key => $value)
            {
                img::where('id',$value)->update(['ord' => $key]);
            }
        }
    }
}
