<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);use App\Models\Ticket;

        # Admin
        DB::table('users')->insert([
            'login' => 'sklad',
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'phone' => '+7(800)-555-35-35',
            'password' => Hash::make('123qwe'),
            'is_admin' => true,
        ]);

    }
}
