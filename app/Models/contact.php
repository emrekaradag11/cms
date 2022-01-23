<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    /*

    #phone => telefon bilgisi için
    #fax => faks bilgisi için
    $map => harita iframe bilgisi için
    $mail => mail adresi içindir

    */


    protected $table = "contact";
    protected $guarded  = ["id"];


    public function setContact($request)
    {

        $data = new contact();

        $data->title = $request->post("title");
        $data->phone = $request->post("phone");
        $data->fax = $request->post("fax");
        $data->map = $request->post("map");
        $data->mail = $request->post("mail");
        $data->save();

        $noti = array(
            'message' => "Başarıyla Eklendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }

    public function updateContact($request)
    {

        $this
            ->where("id" , $request->post("id"))
            ->update([
                "title" => $request->post("title"),
                "phone" => $request->post("phone"),
                "fax" => $request->post("fax"),
                "map" => $request->post("map"),
                "mail" => $request->post("mail"),
            ]);

        $noti = array(
            'message' => "Başarıyla Güncellendi",
            'head'=>'İşlem Başarılı',
            'type' => 'success',
            'status' => '200'
        );

        return $noti;

    }
}
