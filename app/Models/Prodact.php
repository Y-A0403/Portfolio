<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer',
        'order_by',
        'deadline',
        'manager',
        'is_selling',
        'memo',
    ];

    public function scopeSearchProdacts($query, $input = null)
    {
        if(!empty($input)){
            if(Prodact::where('name', 'like', $input .'%')
            ->exists())
            {
                return $query->where('name', 'like', $input .'%');
            }
        }

    }
}
