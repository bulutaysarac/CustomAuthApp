<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sample Product 1',
            'description' => 'This is the first sample product.',
            'price' => 29.99,
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'description' => 'This is the second sample product.',
            'price' => 49.99,
        ]);
    }
}
