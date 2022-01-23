<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{lang,tree,tree_dtl,add_field,pages,field_data,img};

class treeController extends Controller
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
    public function index($id = "")
    {
        dd($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page_id = "")
    {
        $page = pages::find($page_id);
        $tree = tree::where("page_id" , $page_id)->get();
        $fields = add_field::where("page_id",$page_id)->get();
        return view('back.tree.create' , compact("page","tree","fields"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = new tree();

        $data->parent_id = $request->post("parent_id");
        $data->type = $request->post("type");
        $data->page_id = $request->post("page_id");
        $data->save();
        $group_id = $data->id;
 
        $lang = new lang();
        $lang = $lang->lang_short();

        foreach ($lang as $l => $k) {

            $dtl = new tree_dtl();
            $dtl->group_id = $group_id;
            $dtl->title = $request->post("title")[$l];
            $dtl->slug = $request->post("slug")[$l];
            $dtl->text = $request->post("text")[$l];
            $dtl->description = $request->post("description")[$l];
            $dtl->keywords = $request->post("keywords")[$l];
            $dtl->lang = $k->id; 
            $dtl->save();

        }
        
        toastr()->success('Başarıyla Eklendi','İşlem Başarılı');

        return redirect()->route('admin.tree.show',$request->post("page_id"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = pages::find($id);
        $tree = tree::where(["page_id" => $id , "parent_id"=>"0"])->orderBy("ord","asc")->get();
        return view('back.tree.index' , compact("page","tree"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function sortable(Request $request){

        if($request->ajax()){
            $treeModel = new tree();
            $response = $treeModel->change_order($request->post("data"));
        }
        return $response;

    }

    public function hidden(Request $request){
        if($request->ajax()){
            $tree = new tree();
            $response = $tree->changeHidden($request);
        }
        return $response;
    }
}
