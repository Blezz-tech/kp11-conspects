<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('orders')->insert([
            ['user_id' => 1, 'status' => 'в корзине', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'status' => 'новый', 'created_at' => '2023-04-11', 'updated_at' => '2023-04-11'],
            ['user_id' => 1, 'status' => 'подтвержден', 'created_at' => '2023-03-21', 'updated_at' => '2023-03-21'],
            ['user_id' => 1, 'status' => 'отменен', 'created_at' => '2023-02-25', 'updated_at' => '2023-02-25'],
        ]);

        DB::table('order_product')->insert([
            ['order_id' => 1, 'product_id' => 3, 'qty' => 1],
            ['order_id' => 1, 'product_id' => 4, 'qty' => 2],
            ['order_id' => 1, 'product_id' => 5, 'qty' => 1],
            ['order_id' => 2, 'product_id' => 2, 'qty' => 2],
            ['order_id' => 2, 'product_id' => 3, 'qty' => 3],
            ['order_id' => 2, 'product_id' => 4, 'qty' => 1],
            ['order_id' => 3, 'product_id' => 2, 'qty' => 2],
            ['order_id' => 3, 'product_id' => 3, 'qty' => 3],
            ['order_id' => 4, 'product_id' => 1, 'qty' => 1],
            ['order_id' => 4, 'product_id' => 2, 'qty' => 2],
        ]);
    }
}
