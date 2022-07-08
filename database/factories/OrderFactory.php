<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'purchaseId' => mt_rand(1, 5),
            'productId' => mt_rand(1, 10),
            'qty' => $this->faker->randomNumber(3, true),
            'subTotal' => $this->faker->randomNumber(4, true)
        ];
    }
}
