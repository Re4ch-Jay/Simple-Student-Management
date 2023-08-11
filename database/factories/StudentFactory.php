<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'dob' => fake()->date(),
            'pob' => fake()->address(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'major_id' => rand(1, 3),
        ];
    }
}
