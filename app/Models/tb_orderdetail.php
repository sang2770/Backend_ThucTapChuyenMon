<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_orderdetail extends Model
{
    protected $table = 'tb_order';
    protected $fillable = [
        'id_product',
        'id_order',
        'number',
        'price',
    ];
    public $timestamps = false;
}
