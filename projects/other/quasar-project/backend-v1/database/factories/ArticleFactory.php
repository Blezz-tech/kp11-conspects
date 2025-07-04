<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(7),
            'subtitle' => $this->faker->text(7),
            'text' => $this->faker->text(199),
            'image' => null, // TODO Заменить на Image factory create когда будет таблица картинок.
        ];
    }
}
