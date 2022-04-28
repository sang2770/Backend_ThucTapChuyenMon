<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_productcolor extends Model
{
    protected $table = 'tb_productcolor';
    protected $fillable = [
        'id_product',
        'id_color',
    ];
    public $timestamps = false;
}
