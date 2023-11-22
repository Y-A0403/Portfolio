<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodact;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customername',
        'tel',
        'postcode',
        'address',
    ];

    public function scopeSearchCustomers($query,$input = null)
    {
        if(!empty($input)){
            if(customer::where('customername','like',$input.'%')
            ->orwhere('address','like',$input.'%')->exists())
          { 
            return $query->where('customername','like',$input.'%')
            ->orwhere('address','like',$input.'%');
          }
        }
    }

    public function prodacts()
    {
        return $this->hasMany(Prodact::class);
    }
}
