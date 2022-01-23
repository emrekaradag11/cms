<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\{add_field, field_data, pages, lang, img};
use Illuminate\Http\Request;

class textController extends Controller
{

    public function __construct()
    {
        view()->share('lng', lang::get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $fieldModel = new add_field();
        $fieldDataModel = new field_data();
        $page = pages::find($id);
        $fields = $fieldModel->getFieldWithPageId($id);
        $fieldData = $fieldDataModel->getFieldData($page->id,$page->id);
        $pictures = $page->images;

        return view(('back.text.edit') , compact('fields','page','fieldData','pictures'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $pages = new pages(); 
        $pages->setText($request);
        return redirect()->back();
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
    public function uploadPictures(Request $request)
    {
        
        $detail = pages::find($request->id);
        if($request->file("file")){
            $uploadImg = fileUpload($request->file("file"),"uploads",$detail->getFirstName->title,"");
            $detail->images()->create(
                ['img' => $uploadImg,],
            );
        }
    }
}
