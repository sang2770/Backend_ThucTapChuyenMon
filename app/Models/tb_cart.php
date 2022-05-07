<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_cart extends Model
{
    protected $table = 'tb_cart';
    protected $fillable = [
        'id_user',
        'id_product',
        'number', 
        'id_color',
        'id_size',
    ];
    public $timestamps = false;
}
