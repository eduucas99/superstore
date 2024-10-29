<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1b3f65e3-89d3-4d53-8c0d-bdfc9b2f3b9b', 
                'name' => 'Smartphones',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'f5f8b3a4-b733-45f7-a0ef-6a8e2e8c88b5',
                'name' => 'Electronics',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
