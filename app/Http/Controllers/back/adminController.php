<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\panel_users;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function get_index(){
        return view('back.index');
    }

    public function login(){
        return view('back.login');
    }

    public function logout(){
        if (session()->has('adminUser')) {
            session()->pull('adminUser');
            return redirect()->route('admin.login');
        }
    }

    public function postLogin(Request $request){
        $user = panel_users::where(['email' => $request->post('email')])->first();
        if($user && Hash::check($request->post('password'),$user->password)){
            $request->session()->put('adminUser', $user);
            return redirect()->route('admin.index');
        }else{
            toastr()->error('E-Posta veya Şifre Hatalı','Hata');
            return redirect()->route('admin.login');
        }
    }
}
