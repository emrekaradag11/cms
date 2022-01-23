<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lang extends Model
{
    /*

   web sitemizde oluşturacağımız dil seçenekleri içindir.
   #lang => dil ismini temsil eder
   #lang_short => dil'in kısaltması içindir örneğin; türkçe -> TR

   */


    protected $table = "lang";
    protected $guarded  = ["id"];


    public function set_lang($request){
        $name = $request->post("langs");
        $s_name = $request->post("langs_short");
        return $this->insert(['lang' => $name,'lang_short' => $s_name]);
    }

    public function lang_short(){
        $data = $this->select("id","lang_short as lang")->get();
        return $data;
    }

}
