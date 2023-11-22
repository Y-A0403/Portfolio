<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodact>
 */
class ProdactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  
       $random = mt_rand(1,365);
       $futureDate = Carbon::now()->addDay($random);
     return [
            'order_by'=>fake()->numberBetween(10,100),
            'deadline'=>fake()->Date($futureDate),
            'manager'=>fake()->lastName(),
            'memo'=>fake()->realText(30),
            'item_id'=> rand(1,Item::count()),
            'customer_id'=> rand(1,Customer::count()),
            ];
    }
}
