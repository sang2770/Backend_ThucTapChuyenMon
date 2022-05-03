<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable as TraitsFilterable;

class tb_product extends Model
{
    use TraitsFilterable;
    protected $table = 'tb_product';
    protected $fillable = [
        'id_product',
        'rate',
        'availability',
        'descriptions',
        'name',
        'price',
        'discount',
        'image',
        'id_category',
    ];
    protected $primaryKey = 'id_product';
    public $timestamps = false;
    // Tim Kiem Theo Ten
    public function filterName($query, $value)
    {
        
        return $query->where('name', 'like', '%'.$value.'%');
                    
    }
    // Loc Theo The loai
    public function filterCategory($query, $value)
    {
        return $query->where('id_category', $value);
                    
    }
    // Loc Theo Gia
    public function filterPriceFrom($query, $value)
    {
        return $query->where('price','>=', $value);              
    }
    public function filterPriceTo($query, $value)
    {
        if($value>0)
        {
            return $query->where('price','<=', $value);              

        }else{
            return $query;
        }
    }

    
}
