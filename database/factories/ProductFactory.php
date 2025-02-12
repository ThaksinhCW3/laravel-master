<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name'=>fake()->name(),
            'description'=>fake()->text(),
            'category_id'=>rand(1, 10),
            'image'=>fake()->imageUrl(640, 480, 'categories', true),
            'price'=>rand(0,10000),
            'quantity'=>rand(0,50),
            'status'=>rand(0,1),
        ];
    }
}
