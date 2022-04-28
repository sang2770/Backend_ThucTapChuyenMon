<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_color extends Model
{
    protected $table = 'tb_color';
    protected $fillable = [
        'id_color',
        'name_color',
    ];
    protected $primaryKey = 'id_color';
    public $timestamps = false;
}
