<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ticket;
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
            $user = User::factory()->create(['email' => "user$i@a.a"]);
            for ($j = 0; $j < 15; $j++) {
                Ticket::factory()->create([
                    'created_at' => now()->addSeconds(3600 * $i + 60 * $j),
                    'user_id' => $user->id,
                ]);
            }
        }

        User::factory()->create([
            'email'    => 'admin@admin.admin',
            'name'     => 'admin',
            'password' => Hash::make("admin"),
            'is_admin' => true,
        ]);
    }
}
