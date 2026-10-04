<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => "Men's Collection",
            'price' => 850,
            'image' => 'images/men.jpg',
            'size'  => 'XL - 2XL',
            'category_id' => '1'
        ];
    }

    public function woman(): static
    {
        return $this->state([
            'name'  => "Women's Collection",
            'price' => 1100,
            'image' => 'images/woman.jpg',
            'size'  => 'M - L - XL',
            'category_id' => '2'
        ]);
    }

    public function children(): static
    {
        return $this->state([
            'name'  => "Children's Collection",
            'price' => 850,
            'image' => 'images/children.jpg',
            'size'  => 'M - L',
            'category_id' => '3'
        ]);
    }

    public function accessories(): static
    {
        return $this->state([
            'name'  => "Women's Collection",
            'price' => 750,
            'image' => 'images/accessories.jpg',
            'size'  => 'accessories',
            'category_id' => '4'
        ]);
    }
}
