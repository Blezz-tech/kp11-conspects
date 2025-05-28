<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
// use Database\Seeders\CategorySeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Струнные'],
            ['title' => 'Смычковое'],
            ['title' => 'Клавишные'],
            ['title' => 'Другое']
        ]);
    }
}
