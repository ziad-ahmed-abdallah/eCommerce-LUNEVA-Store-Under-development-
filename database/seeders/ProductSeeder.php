<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(100)->create();

        Product::factory()->woman()->count(100)->create();

        Product::factory()->children()->count(100)->create();

        Product::factory()->accessories()->count(100)->create();
    }


}
