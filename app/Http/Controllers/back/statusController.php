<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\status_list;
use App\Models\status_list_types;
use Illuminate\Http\Request;

class statusController extends Controller
{
    public function index(){
        $status_list_types = status_list_types::all();
        $status_list = status_list::all();
        return view('back.status.index' , compact('status_list_types','status_list'));
    }

    public function addStatusListType(Request $request)
    {

        status_list_types::create($request->except(['_token','_method']));
        toastr()->success('Başarıyla Eklendi','İşlem Başarılı');

        return redirect()->back();

    }

    public function addStatusList(Request $request)
    {

        status_list::create($request->except(['_token','_method']));
        toastr()->success('Başarıyla Eklendi','İşlem Başarılı');

        return redirect()->back();

    }
}
