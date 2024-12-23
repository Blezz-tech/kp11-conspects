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
            $user = User::factory()->create(['login' => "user$i"]);
            for ($j = 0; $j < 15; $j++) {
                Ticket::factory()->create([
                    'created_at' => now()->subDays(7)->addHours($i)->addMinutes($j),
                    'date_get' => now()->subDays(4)->addHours($i)->addMinutes($j),
                    'user_id' => $user->id,
                ]);
            }
        }

        User::factory()->create([
            'login'     => 'admin',
            'email'    => 'admin@admin.admin',
            'name'     => 'admin',
            'password' => Hash::make("admin"),
            'is_admin' => true,
        ]);
    }
}
