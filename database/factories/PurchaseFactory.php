<?php

namespace Database\Factories;

use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'purchaseNo' => Str::random(5),
            'date' => now(),
            'payTotal' => $this->faker->randomNumber(4, true)
        ];
    }
}
