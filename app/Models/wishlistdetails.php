<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlistdetails extends Model
{
    protected $table = 'tb_wishlist_details';
    protected $fillable = [
        'id_wishlist',
        'id_product',
    ];
    public $timestamps = false; 
}
