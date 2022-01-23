<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class img extends Model
{
    use HasFactory;

    protected $table = "img";
    protected $fillable = [
        'img',
        'ord',
        'imageable_type',
        'imageable_id',
    ];


    public function imageable()
    {
        return $this->morphTo();
    }
}
