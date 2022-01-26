<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plugin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "plugin";
    protected $guarded  = ["id"];

    public function pluginDetail()
    {
        return $this->hasMany('App\Models\plugin_dtl','plugin_id','id');
    }

}
