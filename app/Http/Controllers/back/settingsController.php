<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{settings,settings_dtl,lang};
use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function __construct()
    {
        view()->share('lng',lang::get());

    }
    
    public function index()
    {
        $data = settings::all();
        return view('back.settings.index',compact('data'));
    }

    public function update(request $request){
        
        $data = $request->except('_token','_method');

        foreach ($data as $kk => $vv) {
            $settings = new settings();
            $group_id = $settings
                        ->where("name" , $kk)
                        ->first()
                        ->id;

            $lang = new lang();
            $lang = $lang->lang_short();
        
            foreach ($lang as $l => $k) {
                $dtl = new settings_dtl();
                $updatedData = $vv;
                if(is_array($updatedData)){
                    $updatedData = $vv[$l];
                }
                $dtl->
                updateOrCreate(
                    [
                        "group_id" => $group_id,
                        'lang' => $k->id
                    ], [
                        'option' => $updatedData,
                    ]
                );
            }
        }
        
        
        toastr()->success('Başarıyla Güncellendi','İşlem Başarılı');

        return redirect()->back();
    }
    
}
