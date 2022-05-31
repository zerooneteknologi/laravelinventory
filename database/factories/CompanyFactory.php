<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'companyName' => $this->faker->company(),
            'companyAddress' => $this->faker->address(),
            'companyEmail' => $this->faker->companyEmail(),
            'companyWebsite' => $this->faker->domainName(),
            'companyPhone' => $this->faker->phoneNumber(),
            'companyPhoto' => 'company.jpg'
        ];
    }
}
