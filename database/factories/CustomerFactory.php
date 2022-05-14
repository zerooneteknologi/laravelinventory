<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customerNo'        => $this->faker->randomNumber(5, true),
            'customerName'      => $this->faker->name(),
            'customerAddress'   => $this->faker->address(),
            'customerPhone'     => $this->faker->phoneNumber()
        ];
    }
}
