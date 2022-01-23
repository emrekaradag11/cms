<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{lang};

class tree_dtl extends Model
{

    /*

    bu tablo tree tablosunu dil'e göre listelemek içindir.
    Örneğin tree tablosunda bir kayıt ekledik.
    bu kayıt'a ait dil'e göre değişecek kayıtları bu tabloda listeleniyor.
    ve listelenen kayıtlar metadata kolonu ile tree tablosuna bağlanıyor.
    böylelikle tree tablosundan diğer tablolara eşleştirme yaparken karmaşa yaşanmıyor.
    bu tablo sadece ilgili tree data'sının detay içeriğini (başlık, metin) çekmek içindir.

    #head => data'nın başlığını temsil eder.
    #text => data'nın metni'ni temsil eder.
    #metadata => bu alan tree tablosu ile eşleştirmek içindir.
    #lang => bu kolon içeriğin dile göre değişmesi içindir.

    */

    protected $table = "tree_dtl";
    protected $guarded  = ["id"];

    public function setDtl($request,$metadata)
    {
        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {

            $data = new tree_dtl();
            $data->metadata = $metadata;
            $data->title = $request->post("title")[$l];
            $data->text = $request->post("text")[$l];
            $data->description = $request->post("description")[$l];
            $data->keywords = $request->post("keywords")[$l];
            $data->lang = $k->id;

            $data->save();

        }
        return true;
    }

    public function update_dtl($request,$metadata)
    {

        $lang = new lang();
        $lang = $lang->lang_short();
        foreach ($lang as $l => $k) {
            $this->
            updateOrCreate(
                [
                    "metadata" => $metadata,
                    'lang' => $k->id
                ], [
                    "title" => $request->post("title")[$l],
                    "text" => $request->post("text")[$l],
                    "description" => $request->post("description")[$l],
                    "keywords" => $request->post("keywords")[$l],
                ]
            );
        }
        return true;

    }


}
