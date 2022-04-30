<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_comment extends Model
{
    protected $table = 'tb_comment';
    protected $fillable = [
        'id_comment',
        'time',
        'content',
        'rate',
        'id_user',
        'id_product',
    ];
    protected $primaryKey = 'id_comment';
    public $timestamps = false;
}
