<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{add_field, pages, lang, pages_dtl};
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function __construct()
    {
        view()->share('lng',lang::get());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = pages::where("parent_id",0)->orderBy('ord')->get();
        return view('back.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = pages::get();
        return view(("back.pages.create") , compact("parent"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $data = new pages();
        $dtl = new pages_dtl();
        $lang = new lang();

        $data->template = $request->post("template");
        $data->parent_id = $request->post("parent_id");
        $data->redirect = $request->post("redirect");
        $data->save(); 

        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $dtl->
                updateOrCreate(
                    [
                        "group_id" => $data->id,
                        'lang' => $k->id
                    ], [
                        "description" => $request->post("description")[$l],
                        "keywords" => $request->post("keywords")[$l],
                        "text" => $request->post("text")[$l],
                        "slug" => $request->post("slug")[$l],
                        "title" => $request->post("title")[$l],
                    ]
                );
        }
        
        toastr()->success('Başarıyla Eklendi','İşlem Başarılı');

        return redirect()->route('admin.pages.index'); 
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
     * @return \Illuminate\Http\Response
     */
    public function edit($page_id)
    {
        $fieldModel = new add_field();
        $parent = pages::all();
        $page = pages::find($page_id);
        $fields = $fieldModel->getFieldWithPageId($page_id);
        return view(('back.pages.edit') , compact("fields","parent",'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pages = new pages();
        
        $pages
            ->where("id" , $id)
            ->update([
                "template" => $request->post("template"),
                "parent_id" => $request->post("parent_id"),
                "redirect" => $request->post("redirect"),
            ]);
        $dtl = new pages_dtl();
        
        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $dtl->
                updateOrCreate(
                    [
                        "group_id" => $id,
                        'lang' => $k->id
                    ], [
                        "title" => $request->post("title")[$l],
                        "slug" => $request->post("slug")[$l],
                        "description" => $request->post("description")[$l],
                        "keywords" => $request->post("keywords")[$l],
                        "text" => $request->post("text")[$l],
                    ]
                );
        }

        toastr()->success('Başarıyla Düzenlendi','İşlem Başarılı');

        return redirect()->route('admin.pages.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
