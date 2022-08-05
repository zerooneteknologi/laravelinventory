<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credit>
 */
class CreditFactory extends Factory
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
            'invoiceId' => mt_rand(1, 5),
            'date' => $this->faker->dateTimeThisMonth(),
            'credit' => $this->faker->randomNumber(3, true),
            'debt' => $this->faker->randomNumber(3, true),
            'expired' =>  date('Y-m-d', time() + 2592000)
        ];
    }
}
