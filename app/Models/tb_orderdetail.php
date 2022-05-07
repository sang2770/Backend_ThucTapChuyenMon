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
        'id_color',
        'id_size'
    ];
    public $timestamps = false;
}
