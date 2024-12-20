<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::factory()->create([
            "email"=> "admin@admin.admin",
            "name"=> "admin",
            "password"=> "admin@admin.admin",
            'is_admin' => true,
        ])
    }
}
