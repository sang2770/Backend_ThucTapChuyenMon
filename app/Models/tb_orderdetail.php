<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_orderdetail extends Model
{
    protected $table = 'tb_order_details';
    protected $fillable = [
        'id_product',
        'id_order',
        'number',
        'price',
        'color',
        'size'
    ];
    public $timestamps = false;
}
