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
    ];
}
