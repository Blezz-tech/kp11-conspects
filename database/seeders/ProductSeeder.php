<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['title'=> 'Рояль C', 'model'=> 'С-01', 'price'=>1000, 'country'=> 'Китай', 'year'=>2001, 'img_path'=>'public/img/рояль 1.jpg', 'qty'=>0, 'category_id'=>3,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Рояль B', 'model'=> 'B-02', 'price'=>2000, 'country'=> 'Корея', 'year'=>1990, 'img_path'=>'public/img/рояль 2.jpg', 'qty'=>15, 'category_id'=>3,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Рояль Z', 'model'=> 'Z-03', 'price'=>5000, 'country'=> 'Китай', 'year'=>2002, 'img_path'=>'public/img/рояль 3.jpg', 'qty'=>11, 'category_id'=>3,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Рояль W', 'model'=> 'W-01', 'price'=>7000, 'country'=> 'Россия', 'year'=>2020, 'img_path'=>'public/img/рояль 4.jpg', 'qty'=>7, 'category_id'=>1,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Рояль G', 'model'=> 'G-02', 'price'=>5000, 'country'=> 'КНДР', 'year'=>2015, 'img_path'=>'public/img/рояль 5.jpg', 'qty'=>6, 'category_id'=>1,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Скрипка', 'model'=> 'S-01', 'price'=>20000, 'country'=> 'Австрия', 'year'=>1760, 'img_path'=>'public/img/скрипка.jpg', 'qty'=>1, 'category_id'=>2,'created_at'=>Now(), 'updated_at'=>Now()],
            ['title'=> 'Виолончель', 'model'=> 'T-01', 'price'=>30000, 'country'=> 'Китай', 'year'=>2021, 'img_path'=>'public/img/виолончель.jpg', 'qty'=>0, 'category_id'=>2,'created_at'=>Now(), 'updated_at'=>Now()],
        ]);
    }
}
