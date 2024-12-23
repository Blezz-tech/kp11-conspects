<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\State;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_get' => now(),
            'comment' => fake()->text(),
            'is_nalink' => rand(0, 1),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'state_id' => State::inRandomOrder()->first()->id,
        ];
    }
}
