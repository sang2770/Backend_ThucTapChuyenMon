<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_product extends Model
{
    protected $table = 'tb_product';
    protected $fillable = [
        'id_product',
        'rate',
        'availability',
        'descriptions',
        'name',
        'price',
        'discount',
        'image',
        'id_category',
    ];
    protected $primaryKey = 'id_product';
    public $timestamps = false;
}
