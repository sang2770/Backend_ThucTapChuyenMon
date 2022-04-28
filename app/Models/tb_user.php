<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    protected $table = 'tb_user';
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'password',
    ];
    protected $primaryKey = 'id_user';
    public $timestamps = false; 
}
