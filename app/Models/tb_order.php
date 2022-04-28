<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_order extends Model
{
    protected $table = 'tb_order';
    protected $fillable = [
        'id_order',
        'address',
        'status',
        'time',
        'id_user',
    ];
    protected $primaryKey = 'id_comment';
    public $timestamps = true;
}
