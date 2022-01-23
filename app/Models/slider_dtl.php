<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slider_dtl extends Model
{

    /*

    Bu tablo anasayfada bulunan büyük slider yazı ve görselleri için kullanılır

    #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
    #ord      => bu alan datalar arası sıralama yapmak içindir

    */

    protected $table = "slider_dtl";
    protected $guarded  = ["id"];
}
