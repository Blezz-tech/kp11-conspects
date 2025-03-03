<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ // здесь регистрируем все сидоры, которые у нас есть, чтобы запускать их с помощью команды php artisan db:seed
            UserSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
