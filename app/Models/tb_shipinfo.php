<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_shipinfo extends Model
{
    protected $table = 'tb_shipinfo';
    protected $fillable = [
        'id_ship',
        'shipname',
        'phone',
        'address',
        'isdefault',
        'id_user',
    ];
    protected $primaryKey = 'id_ship';
    public $timestamps = true;       
}
