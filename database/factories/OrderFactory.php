<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->address(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'email' => fake()->email(),
            'payment_type' => fake()->randomElement(['cash', 'card']),
            'status' => fake()->randomElement(['new', 'confirmed', 'cancelled']),
            'rejection_reason' => fake()->text(100),
            'user_id' => User::factory()->create(),
        ];
    }
}
