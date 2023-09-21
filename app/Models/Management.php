<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Order;


class Management extends Model
{
    use HasFactory;

    protected $table = 'prodacts';

    protected $fillable = [
        'item_id',
        'customer_id',
        'order_by',
        'deadline',
        'manager',
        'is_selling',
        'memo',
    ];
    
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

    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
