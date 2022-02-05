<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings_dtl extends Model
{
    use HasFactory; 
    protected $table = "settings_dtl";
    protected $guarded  = ["id"];
}
