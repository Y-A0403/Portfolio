<?php

namespace Database\Factories;
use Carbon\Carbon;

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
    {  $items = ['タイヤ','ホイール','マフラー','ワイパー','ライト','ナット','カーナビ','ミラー',];
       $customers = ['A社','B社','C社','D社','E社','F社','G社','H社','I社','J社','K社','L社',];
       $random = mt_rand(1,365);
       $futureDate = Carbon::now()->addDay($random);
        return [
            'name'=>fake()->randomElement($items),
            'customer'=>fake()->randomElement($customers),
            'order_by'=>fake()->numberBetween(10,100),
            'deadline'=>fake()->Date($futureDate),
            'manager'=>fake()->lastName(),
            'memo'=>fake()->realText(30),
        ];
    }
}
