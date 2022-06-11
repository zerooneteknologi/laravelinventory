<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customerId' => mt_rand(1, 10),
            'invoiceNo' => Str::random(5),
            'add_at' => now(),
            'paytotal' => $this->faker->randomNumber(5, true),
            'cash' => $this->faker->randomNumber(3, true),
            'refund' => $this->faker->randomNumber(2, true)
        ];
    }
}
