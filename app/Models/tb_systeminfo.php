<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_systeminfo extends Model
{
    protected $table = 'tb_systeminfo';
    protected $fillable = [
        'id_shop',
        'nameshop',
        'hotline',
        'aboutus',
    ];
    protected $primaryKey = 'id_shop';
    public $timestamps = false;   
}
