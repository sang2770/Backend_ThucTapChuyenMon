<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class tb_user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Filterable;
    protected $table = 'tb_user';
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];
    protected $primaryKey = 'id_user';
    public $timestamps = false; 
    // Loc Theo The loai
    public function filterName($query, $value)
    {
        return $query->where('name','like', '%'. $value.'%');
                    
    }
    public function filterEmail($query, $value)
    {
        return $query->where('email','like', '%'. $value.'%');
                    
    }
}
