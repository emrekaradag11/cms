<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class slider extends Model
{


    /*
        Bu tablo anasayfada bulunan büyük slider yazı ve görselleri için kullanılır

        #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
        #ord      => bu alan datalar arası sıralama yapmak içindir
     */

    use SoftDeletes;
    protected $table = "slider";
    protected $guarded  = ["id"];
}
