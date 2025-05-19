<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run(): void {
        Product::insert([
            [
                'name' => 'Steamed Buff Momo',
                'description' => 'Classic steamed buff momos with achar.',
                'price' => 150,
                'image' => 'steamed-buff.jpg',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Fried Chicken Momo',
                'description' => 'Crispy chicken momo with spicy chutney.',
                'price' => 180,
                'image' => 'fried-chicken.jpg',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'C-Momo Lava',
                'description' => 'Super spicy C-Momo drenched in red chili sauce.',
                'price' => 200,
                'image' => 'lava-cmomo.jpg',
                'created_at' => now(), 'updated_at' => now()
            ]
        ]);
    }
}
