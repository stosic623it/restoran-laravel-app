<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'total_price' => fake()->numberBetween(-10000, 10000),
            'status' => fake()->regexify('[A-Za-z0-9]{50}'),
        ];
    }
}
