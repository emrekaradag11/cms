<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{add_field_dtl};

class add_field extends Model
{
    /*

    #type     => bu kısım ek alanın tipini belirlemek içindir. örneğin 1 ise input, 2 ise selectbox vb.
    #page_id  => bu kısım pages tablosu ile eşleştirmek içindir. ek alanın bulunduğu sayfayı listelemek içindir.
    #ord      => ek alanlar arası sıralama yapmak içindir.
    #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
    #options  => bu alan ek alanın ekstra özelliklerini tanımlamak için

    #TYPE ÖZELLİKLERİ

    checkbox,       => çoklu özellik çoklu seçim
    color,          => renk seçimi
    date,           => tarih seçimi
    datetime-local, => tarih ve saat seçimi
    email,          => e-posta
    file,           => dosya
    month,          => ay seçimi
    number,         => sayı
    radio,          => çoklu özellik tekli seçim
    range,          => seçim aralığı
    tel,            => telefon
    text,           => yazı
    time,           => saat
    url,            => site url için
    week,           => bulunduğu hafta için
    select,         => Selectbox için
    textarea,       => Büyük Metin Kutusu

    */


    protected $table = "add_field";
    protected $guarded  = ["id"];


    public function setField($request)
    {
        $data = new add_field();
        $data->type = $request->post("type");
        $data->page_id = $request->post("page_id");
        $data->options = $request->post("options");
        $data->save();
        $group_id = $data->id;

        $dtl = new add_field_dtl();
        $dtl->setDtl($request , $group_id);

        $noti = array(
            'message' => "Ek Alan Başarıyla Eklendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }


    public function updateField($request)
    {

        $this->
            updateOrCreate(
                [
                    'id' => $request->id,
                    'page_id' => $request->page_id,
                ], [
                "type" => $request->post("type"),
                "page_id" => $request->post("page_id"),
                "options" => $request->post("options"),
            ]);

        $dtl = new add_field_dtl();
        $dtl->updateDtl($request , $request->id);

        $noti = array(
            'message' => "Ek Alan Başarıyla Güncellendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }


    public function getFieldWithPageId($page_id)
    {
        return
            $this->
            where("page_id",$page_id)
                ->orderBy("ord","asc")
            ->get();
    }
    public function getFieldWithId($id)
    {
        return
            $this->
            where("id",$id)
            ->first();
    }

    public function deleteField($id)
    {
        $this->where("id",$id)->delete();
        return true;
    }


    /* bu kısım ek alan ismini listelemek için*/
    public function getFirstName()
    {
        return $this->hasOne('App\Models\add_field_dtl','group_id','id');
    }

    /* bu kısım ek alan detayını dil'e göre listelemek için */
    public function fieldDetail()
    {
        return $this->hasMany('App\Models\add_field_dtl','group_id','id');
    }

    public function deleteFieldWithPageId($page_id)
    {

        $this->where("page_id",$page_id)->each(function($q){
            $q->fieldDetail()->delete();
            $q->delete();
        });

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

}
