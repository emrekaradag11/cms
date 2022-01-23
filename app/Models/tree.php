<?php

namespace App\Models;

use App\Models\{tree_dtl};
use Illuminate\Database\Eloquent\Model;

class tree extends Model
{

    /*

    Bu tablo tree şablonunda oluşturulan sayfalar için data barındırır.
    Örneğin Ürünler diye bir sayfamız var. buradaki page_id , pages tablosundaki id ile eşleşir,
    ve ürünler sayfasına ait dataları getirir.

    #parent   => bu alan tree yapısını kendi içerisinde kategorize etmek içindir.
    #type     => bu alan eğer 0 ise kategori 1 ise ürün olduğunu temsil eder.
    #page_id  => bu alan pages tablosu ile eşleşir ve bulunduğu sayfanın datalarını çeker.
    #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
    #ord      => bu alan datalar arası sıralama yapmak içindir

    */

    protected $table = "tree";
    protected $guarded  = ["id"];


    public function set_tree($request)
    {
        $data = new tree();

        $data->parent = $request->post("parent");
        $data->type = $request->post("type");
        $data->page_id = $request->post("page_id");
        $data->save();
        $metadata = $data->id;

        $dtl = new tree_dtl();
        $dtl->setDtl($request , $metadata);


        /*
        imgParent
        imgType
        imgDeleted
        imgSlugName
        imgID

        */
        $request["imgParent"] = $metadata;
        $request["imgSlugName"] = $request->post("title")[0];

        $imgModel = new img();
        $imgModel->set_img($request);



        $noti = array(
            'message' => "Başarıyla Eklendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;
    }

    public function updateTree($request)
    {

        $this
            ->where("id" , $request->post("id"))
            ->update([
                "parent" => $request->post("parent"),
                "type" => $request->post("type"),
                "page_id" => $request->post("page_id"),
            ]);

        $dtl = new tree_dtl();
        $dtl->update_dtl($request , $request->post("id"));

        $noti = array(
            'message' => "Başarıyla Güncellendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }


    /* bu kısım sayfa başlığını listelemek için*/
    public function getFirstName()
    {
        return $this->hasOne('App\Models\tree_dtl','group_id','id')->where("lang","1");
    }

    /* bu kısım sayfa başlığını dil'e göre listelemek için */
    public function getDetail()
    {
        return $this->hasMany('App\Models\tree_dtl','group_id','id');
    }


    public function getSubControl()
    {
        return $this->hasMany('App\Models\tree','parent_id','id');
    }

    public function getSubCategories()
    {
        return $this->hasMany('App\Models\tree','parent_id','id');
    }

    public function deleteTreeWithPageId($page_id)
    {

        $this->where("page_id",$page_id)->each(function($q){
            $q->getDetail()->delete();
            $q->delete();
        });

    }
    public function deleteTreeWithID($id)
    {

        $this->where("id",$id)->each(function($q){
            $q->getDetail()->delete();
            $q->delete();
        });
        $noti = array(
            'message' => "Başarıyla Silindi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }

    public function change_order($request){

        foreach ($request as $key => $value)
        {
            $this->where('id',$value)->update(["ord" => $key]);
        }

        $noti = array(
            'message' => "Sıralama Başarılı",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;
    }

    public function changeHidden($request){
        $this->where('id',$request->post("id"))->update(["hidden" => $request->post("hidden")]);

        if($request->post("hidden") == "1"){
            $hidden = "0";
            $icon = "fa-eye-slash";
        }else{
            $hidden = "1";
            $icon = "fa-eye";
        }

        $noti = array(
            'message' => "Gizleme Başarılı",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200',
            'hidden' => $hidden,
            'icon' => $icon
        );

        return $noti;

    }



}
