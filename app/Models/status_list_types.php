<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_list_types extends Model
{
    use HasFactory;
    protected $table = "status_list_types";
    protected $fillable = [
        'title',
    ];

}
