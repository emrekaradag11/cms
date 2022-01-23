<?php

namespace App\Models;

use App\Models\pages_dtl;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{

    /*
     #parent_id    => sayfaları tree mantığı ile bağlamak için
     #template  => sayfaların şablonlarını belirlemek için (Tree,text,img vs)
     #redirect  => hiç sayfa olmadan yönlendirme yapmak için (ÖRN:www.google.com)
     #hidden    => bu alan sayfaları gizlemek içindir. 1 ise gizli
     #ord       => sayfalar arası sıralama yapmak için
     */



    protected $table = "pages";
    protected $guarded  = ["id"];
    
    
    public function setText($request)
    {

        $dtl = new pages_dtl();
        $dtl->setTextDtl($request , $request->post("page_id"));

        $noti = array(
            'message' => "Başarıyla Güncellendi",
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


    /* bu kısım sayfa başlığını listelemek için*/
    public function getFirstName()
    {
        return $this->hasOne('App\Models\pages_dtl','group_id','id');
    }

    /* bu kısım sayfa başlığını dil'e göre listelemek için */
    public function getDetail()
    {
        return $this->hasMany('App\Models\pages_dtl','group_id','id');
    }


    public function getSubControl()
    {
        return $this->hasMany('App\Models\pages','parent_id','id');
    }

    public function getSubCategories()
    {
        return $this->hasMany('App\Models\pages','parent_id','id')->orderBy("ord","asc");
    }

    public function delete_page($page_id)
    {
        $addFieldModel = new add_field();
        $fieldDataModel = new field_data();
        $treeModel = new tree();
        $imgModel = new img();

        $addFieldModel->deleteFieldWithPageId($page_id);
        $treeModel->deleteTreeWithPageId($page_id);
        $imgModel->deleteImgWithPageId($page_id);
        $fieldDataModel->deleteFieldDataWithPageId($page_id);

        $this->where("id",$page_id)->each(function($q){
            $q->getDetail()->delete();
            $q->delete();
        });

    }

    public function images()
    {
        return $this->morphMany(img::class, 'imageable')->orderBy("ord");
    }

}
