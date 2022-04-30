<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accountType' => 'student',
            'universityID' => Str::random(11),
            'firstName' => $this->faker->name(),
            'middleName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'birthDate' => now(),
            'address' => Str::random(20),
            'phoneNumber' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'username' => 'biowulf21',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
