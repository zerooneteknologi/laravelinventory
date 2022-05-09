<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suplayer>
 */
class SuplayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'email' => $this->faker->freeEmail(),
            'website' => $this->faker->domainName(),
            'phoneNumber' => $this->faker->randomNumber(9, true)
        ];
    }
}
