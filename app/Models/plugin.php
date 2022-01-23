<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plugin extends Model
{
    use HasFactory;

    protected $table = "plugin";
    protected $guarded  = ["id"];

    public function pluginDetail()
    {
        return $this->hasMany('App\Models\plugin_dtl','plugin_id','id');
    }

}
