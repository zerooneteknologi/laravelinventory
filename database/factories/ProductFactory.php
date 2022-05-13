<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'categoryId' => mt_rand(1, 3),
            'suplayerId' => mt_rand(1, 10),
            'ProductCode' => Str::random(5),
            'productName' => $this->faker->sentence(2),
            'brand' => $this->faker->words(2, true),
            'stock' => 100,
            'price' => 2000
        ];
    }
}
