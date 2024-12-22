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
        $state = State::inRandomOrder()->first()->id;
        $x = rand(1, 7);
        $y = rand(1,7);
        while ($y == $x) {
            $y = rand(1, 7);
        }
        return [
            'title' => fake()->text(),
            'description' => fake()->text(),
            'photo_before' => 'imgs/'.$x.'.jpg',
            'photo_after' => $state == 2 ? 'imgs/'.$y.'.jpg' : null,
            'comment' => $state == 3 ? fake()->text() : null,

            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'state_id' => $state,
        ];
    }
}
