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

        # Товары
        foreach ([
            ['Арбуз', '200'],
            ['Шоколад', '100'],
            ['Сахар', '150'],
            ['Кекс', '75'],
        ] as $key => $product) {
            DB::table('products')->insert([
                'name' => $product[0],
                'price' => $product[1],
            ]);
        }

        # Юззвери
        DB::table('users')->insert([
            'login' => 'admin',
            'password' => Hash::make('1234'),
            'phone' => '+7(800)-555-35-35',
            'name' => 'пользователь',
            'email' => Str::random(10).'@example.com',
        ]);

        # Заказы

        DB::table('orders')->insert([
            'user_id' => 2,
            'product_id' => 1,
            'count' => 300,
            'address' => "Чебоксары",
            'status' => 0,
        ]);
        DB::table('orders')->insert([
            'user_id' => 2,
            'product_id' => 2,
            'count' => 50,
            'address' => "Чебоксары",
            'status' => 0,
        ]);
        DB::table('orders')->insert([
            'user_id' => 2,
            'product_id' => 3,
            'count' => 150,
            'address' => "Чебоксары",
            'status' => 0,
        ]);
    }
}
