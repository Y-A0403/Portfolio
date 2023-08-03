<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodacts')->insert([
            [
            'name' => 'ボルト',
            'customer' => 'A社',
            'order_by' => '50',
            'deadline' => '2023,10,07',
            'manager' => '小島',
            ],
            [
            'name' => 'クリップ',
            'customer' => 'B社',
            'order_by' => '50',
            'deadline' => '2023,10,30',
            'manager' => '佐藤',
            ],
            [
            'name' => 'タイヤ',
            'customer' => 'C社',
            'order_by' => '20',
            'deadline' => '2023,11,09',
            'manager' => '高橋',
            ]
        ]);
    }
}
