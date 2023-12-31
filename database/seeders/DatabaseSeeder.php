<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ItemSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            ProdactSeeder::class,
        ]);
        
        \App\Models\Item::Factory(50)->create();
        \App\Models\Customer::Factory(50)->create();
        \App\Models\Prodact::Factory(50)->create();
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
