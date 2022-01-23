<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{plugin,plugin_dtl};
use Illuminate\Http\Request;

class pluginController extends Controller
{
    
    public function index()
    {
        $plugins = plugin::all();
        return view('back.plugin.index',compact('plugins'));
    }

    public function update(request $request){
        foreach($request->data as $k => $v){  
            plugin::updateOrCreate(
                [
                    'id' => $k, 
                ], [
                "status_id" => $v['status_id'], 
            ]);
            foreach($v['options'] as $kk => $vv){
                plugin_dtl::updateOrCreate(
                    [
                        'plugin_id' => $k,
                        'id' => $kk,
                    ], [
                    "option" => $vv ?? '', 
                ]);
            } 
        }
        toastr()->success('Başarıyla Güncellendi','İşlem Başarılı');
        return redirect()->back();
    }
    
}
