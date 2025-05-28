<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Book::factory(33)->create()->each(function ($book){
            $numReviews = rand(5, 30);
            Comment::factory()
                ->count($numReviews)
                ->for($book)
                ->for(User::all()->random())
                ->create();
        });

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
