<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_wishlist extends Model
{
    protected $table = 'tb_wishlist';
    protected $fillable = [
        'id_wishlist',
        'id_user',
    ];
    protected $primaryKey = 'id_wishlist';
    public $timestamps = true; 
}
