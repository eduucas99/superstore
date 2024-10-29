<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => '68844720-c839-4fc5-a78a-aba7cc0dcf1c',
                'name' => 'Apple IPhone 20 Ultra Pro Super Max',
                'description' => 'El mejor Iphone del mundo',
                'image_url' => 'http://localhost:8000/assets/imgs/products/68844720-c839-4fc5-a78a-aba7cc0dcf1c',
                'cta_url' => 'https://www.apple.com/',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '81fffb94-510e-496a-8b95-a8abf91e65dd',
                'name' => 'Samsung Galaxy Z365 Ultra Max',
                'description' => 'El mejor Smartphone del mundo',
                'image_url' => 'http://localhost:8000/assets/imgs/products/81fffb94-510e-496a-8b95-a8abf91e65dd',
                'cta_url' => 'https://www.samsung.com/',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
