<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\lang;

class add_field_dtl extends Model
{

    /*

    #group_id => bu kolon add_field tablosu ile birleştirmek içindir.
    #name => bu kısım ek alan başlığını dil'e göre değiştirmek içindir.
    #properties => bu kısım ek alana ait dil'e göre değişecek özelliklere belirtmek içindir.
    örneğin ; meyveler başlığı olarak checkbox olarak bi ek alan tanımlandı.
    bu ek alanın altına gelecek özellikler'in dil'e göre değişmesi gerekir. örneğin elma,armut,apple,banana gibi
    #lang => bu kolon data'nın bulunduğu dil', belirtir.

    */

    protected $table = "add_field_dtl";
    protected $guarded  = ["id"];



    public function setDtl($request,$group_id)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {

            $data = new add_field_dtl();
            $data->group_id = $group_id;
            $data->name = $request->post("name")[$l];
            $data->properties = $request->post("properties")[$l];
            $data->lang = $k->id;
            $data->save();

        }
        return true;

    }


    public function updateDtl($request,$group_id)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {

            $this->
                updateOrCreate(
                    [
                        "group_id" => $group_id,
                        'lang' => $k->id
                    ], [
                        "group_id" => $group_id,
                        "name" => $request->post("name")[$l],
                        "properties" => $request->post("properties")[$l],
                    ]
                );

        }
        return true;

    }

    public function getFieldDetailWithId($group_id)
    {

        return
            $this->
            where("group_id",$group_id)
                ->get();

    }

}
