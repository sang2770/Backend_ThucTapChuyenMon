<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_category extends Model
{
    protected $table = 'tb_category';
    protected $fillable = [
        'id_category',
        'name_category',
    ];
    protected $primaryKey = 'id_category';
    public $timestamps = true;
}
