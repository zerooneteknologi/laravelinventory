<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoiceId' => mt_rand(1, 5),
            'productId' => mt_rand(1, 9),
            'qty' => $this->faker->randomNumber(2, true),
            'subTotal' => $this->faker->randomNumber(3, true),
        ];
    }
}
