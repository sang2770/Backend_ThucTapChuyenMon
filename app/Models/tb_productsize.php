<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_productsize extends Model
{
    protected $table = 'tb_productsize';
    protected $fillable = [
        'id_product',
        'id_size',
    ];
    public $timestamps = false;
}
