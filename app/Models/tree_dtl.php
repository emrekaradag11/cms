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
    
}
