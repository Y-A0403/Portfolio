<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 電話番号のーをなくす
        $tel = str_replace('-','',fake()->phoneNumber());
        // 住所の前の郵便番号以降を取得
        $address = mb_substr(fake()->address(),9);

        return [
            'customername' => fake()->unique()->company(),
            'tel' => $tel,
            'postcode' => fake()->postcode(),
            'address' => $address,
        ];
    }
}
