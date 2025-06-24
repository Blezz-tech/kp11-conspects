<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(10)->create();
    }

    private function articles(): array
    {
        return [
            [
                'title' => 'ген',
                'subtitle' => 'подряд',
                'path_text' => null,
                'img' => '/src/assets/1.png'
            ],
            [
                'title' => 'стена',
                'subtitle' => 'в грунте',
                'path_text' => null,
                'img' => '/src/assets/2.png'
            ],
            [
                'title' => 'монолитное',
                'subtitle' => 'строительство',
                'path_text' => null,
                'img' => '/src/assets/3.png'
            ],
            [
                'title' => 'шпунтовое',
                'subtitle' => 'ограждение',
                'path_text' => null,
                'img' => '/src/assets/4.png'
            ],
            [
                'title' => 'Буронабивные',
                'subtitle' => 'Cваи',
                'path_text' => null,
                'img' => '/src/assets/5.png'
            ],
            [
                'title' => 'Буроинъекционные',
                'subtitle' => 'Cваи',
                'path_text' => null,
                'img' => '/src/assets/6.png'
            ],
            [
                'title' => 'РИТ, ЭРСТ',
                'subtitle' => 'Cваи',
                'path_text' => null,
                'img' => '/src/assets/7.png'
            ],
            [
                'title' => 'гидро',
                'subtitle' => 'изоляция',
                'path_text' => null,
                'img' => '/src/assets/8.png'
            ],
            [
                'title' => 'Разработка',
                'subtitle' => 'котлованов',
                'path_text' => null,
                'img' => '/src/assets/9.png'
            ],
            [
                'title' => 'Укрепление',
                'subtitle' => 'грунтов',
                'path_text' => null,
                'img' => '/src/assets/10.png'
            ],
        ];
    }
}
