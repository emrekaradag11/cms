<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class status_list extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "status_list";
    protected $fillable = [
        'title',
        'status_type_id',
    ];

}
