<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_size extends Model
{
    protected $table = 'tb_size';
    protected $fillable = [
        'id_size',
        'size',
    ];
    protected $primaryKey = 'id_size';
    public $timestamps = false;
}
