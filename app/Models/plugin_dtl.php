<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plugin_dtl extends Model
{
    use HasFactory;
    protected $table = "plugin_dtl";
    protected $guarded  = ["id"];
}
