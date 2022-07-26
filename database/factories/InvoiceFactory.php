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
            'memberId' => mt_rand(1, 5),
            'paymentId' => mt_rand(1, 3),
            'invoiceNo' => Str::random(4),
            'date' => now(),
            'payTotal' => $this->faker->randomNumber(4, true)
        ];
    }
}
