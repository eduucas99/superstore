<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_product')->insert([
            [
                'category_id' => '1b3f65e3-89d3-4d53-8c0d-bdfc9b2f3b9b',
                'product_id' => '68844720-c839-4fc5-a78a-aba7cc0dcf1c', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 'f5f8b3a4-b733-45f7-a0ef-6a8e2e8c88b5',
                'product_id' => '68844720-c839-4fc5-a78a-aba7cc0dcf1c', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 'f5f8b3a4-b733-45f7-a0ef-6a8e2e8c88b5',
                'product_id' => '81fffb94-510e-496a-8b95-a8abf91e65dd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
