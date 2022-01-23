<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{panel_user_types,panel_users};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class panelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = panel_users::all();
        $user_types_data = panel_user_types::all();
        return view('back.panelUsers.index',compact('data','user_types_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $user_types = panel_user_types::all();
        return view('back.panelUsers.create',compact('user_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'confirmed',
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|string|email|max:255|unique:panel_users',
            ]/*,[
                'name.required' => __('validation.required' , ['attribute' => __('variable.adi')]),
                'last-name.required' => __('validation.required' , ['attribute' => __('variable.soyadi')]),
                'email.required' => __('validation.required' , ['attribute' => __('variable.email')]),
            ]*/,
        );

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $uploadImg = fileUpload($request->file('img'),'uploads',$request->name,'');

        $users = new panel_users();
        $users->password = Hash::make($request->password);
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->email = $request->email;
        $users->type_id = $request->type_id;
        $users->save();
        $users->image()->updateOrCreate(
            ['img' => $uploadImg]
        );

        toastr()->success('Başarıyla Eklendi','İşlem Başarılı');

        return redirect()->route('admin.panel_users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = panel_users::find($id);
        $user_types = panel_user_types::all();
        return view('back.panelUsers.update',compact('user_types','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'password' => 'bail|confirmed',
            'name' => 'bail|required|string|max:255',
            'surname' => 'bail|required|string|max:255',
            'type_id' => 'bail|required',
        ];


        $validator = Validator::make(
            $request->all(),
            $rules,
        );

        if($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();


        if(!Hash::check($request->default_password,panel_users::find($id)->password)) {
            toastr()->error('Mevcut Şifre Hatalı','Hata');
            return redirect()->back();
        }

        $users = panel_users::find($id);
        $users->password = isset($request->password) ? Hash::make($request->password) : $users->password;
        $users->name = $request->name;
        $users->surname = $request->surname;
        $users->email = $request->email;
        $users->type_id = $request->type_id;
        $users->save();
        if($request->file('img')){
            $uploadImg = fileUpload($request->file('img'),'uploads',$request->name,$users->image->img ?? null);
            $users->image()->updateOrCreate(
                [],
                ['img' => $uploadImg,],
            );
        }

        toastr()->success('Başarıyla Güncellendi','İşlem Başarılı');

        return redirect()->route('admin.panel_users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $users = panel_users::find($id);
        if($users->type_id == '1')
            toastr()->error('Süper Admin Silinemez','Hata');
        else{
            panel_users::find($id)->delete();
            toastr()->success('Başarıyla Silindi','İşlem Başarılı');
        }

        return redirect()->back();
    }
}
