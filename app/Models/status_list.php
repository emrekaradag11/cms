<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_list extends Model
{
    use HasFactory;
    protected $table = "status_list";
    protected $fillable = [
        'title',
        'status_type_id',
    ];

}
