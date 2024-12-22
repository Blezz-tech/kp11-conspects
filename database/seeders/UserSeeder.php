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
        for ($i = 0; $i < 10; $i++) {
            User::factory()
                ->hasTickets(15)
                ->create([
                    'login' => 'user'. $i,
                    'password' => Hash::make('123'),
                ]);
        }


        User::factory()->create([
            'login'    => 'admin',
            'email'    => 'admin@admin.admin',
            'name'     => 'admin',
            'password' => Hash::make("admin"),
            'is_admin' => true,
        ]);
    }
}
