<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'login' => 'admin',
            'email' => 'admin@admin.admin',
            'isAdmin' => true,
            'password' => Hash::make('admin')
        ]);
    }
}
