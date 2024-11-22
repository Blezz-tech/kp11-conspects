<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'login' => 'admin',
            'email' => 'admin@admin.admin',
            'password' =>  Hash::make('123'),
            'isAdmin' => 1,
        ]);

        User::factory()->create([
            'login' => 'user',
            'email' => 'user@user.user',
            'password' =>  Hash::make('123'),
        ]);
    }
}
