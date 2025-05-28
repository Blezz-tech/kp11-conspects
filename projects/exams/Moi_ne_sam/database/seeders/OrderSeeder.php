<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $services = Service::all();

        foreach ($users as $user) {
            Order::factory()
                ->state(['user_id' => $user->id])
                ->count(rand(10, 15))
                ->create()
                ->each(function ($order) use ($services) {
                    $order->services()->attach(
                        $services->random(rand(3, 5))->pluck('id')
                    );
                });
        }
    }
}
