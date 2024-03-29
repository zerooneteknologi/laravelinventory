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
            'payment' => 'cash',
            'invoiceNo' => Str::random(4),
            'date' => $this->faker->dateTimeThisMonth(),
            'payTotal' => $this->faker->randomNumber(4, true)
        ];
    }
}
