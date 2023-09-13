<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemname'
    ];

    public function scopeSearchItems($query,$input = null)
    {
        if(!empty($input)){
            if(item::where('itemname','like',$input.'%')->exists())
            {
                return $query->where('itemname','like',$input.'%');
            }
        }
    }
}
