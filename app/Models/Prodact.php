<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Customer;
use App\Models\order;

class Prodact extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_by',
        'deadline',
        'manager',
        'is_selling',
        'memo',
        'item_id',
        'customer_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
