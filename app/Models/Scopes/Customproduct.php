<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Customproduct implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $sql = 
        'select prodacts.id as id,
        order_by,
        deadline,
        manager,
        is_selling,
        prodacts.memo as memo,
        prodacts.created_at,
        prodacts.updated_at,
        item_id,
        customer_id,
        itemname,
        customername 
        from prodacts 
        inner join items on prodacts.item_id = items.id
        inner join customers on prodacts.customer_id = customers.id';
        
        $builder->fromSub($sql,'order_customproducts');
    }
}
