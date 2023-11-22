<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Customproduct;

class Order extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new Customproduct);
    }

    public function scopeSearchOrders($query, $input = null)
    {
        if(!empty($input))
        {
            if(Order::where('itemname', 'like', $input .'%')
            ->exists())
            {
                return $query->where('itemname', 'like', $input .'%');
            }
        }
    }
}
