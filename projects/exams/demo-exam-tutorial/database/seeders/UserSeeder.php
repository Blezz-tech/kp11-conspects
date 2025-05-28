<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
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

        $user = User::factory()->create([
            'login' => 'user',
            'email' => 'user@user.user',
            'password' =>  Hash::make('123'),
        ]);

        $order = new Order;
        $order->user_id = $user->id;
        $order->status = 'В корзине';
        $order->save();
    }
}
