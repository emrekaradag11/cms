<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class settings extends Model
{
    use HasFactory; 
    protected $table = "settings";
    protected $guarded  = ["id"];


    public function getDetail()
    {
        return $this->hasMany('App\Models\settings_dtl','group_id','id');
    }
}
