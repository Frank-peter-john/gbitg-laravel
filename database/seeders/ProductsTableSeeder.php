<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 dummy products
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 19.99,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'price' => 29.99,
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description of Product 3',
            'price' => 39.99,
        ]);

        Product::create([
            'name' => 'Product 4',
            'description' => 'Description of Product 4',
            'price' => 49.99,
        ]);

        Product::create([
            'name' => 'Product 5',
            'description' => 'Description of Product 5',
            'price' => 59.99,
        ]);

        Product::create([
            'name' => 'Product 6',
            'description' => 'Description of Product 6',
            'price' => 69.99,
        ]);

        Product::create([
            'name' => 'Product 7',
            'description' => 'Description of Product 7',
            'price' => 79.99,
        ]);

        Product::create([
            'name' => 'Product 8',
            'description' => 'Description of Product 8',
            'price' => 89.99,
        ]);

        Product::create([
            'name' => 'Product 9',
            'description' => 'Description of Product 9',
            'price' => 99.99,
        ]);

        Product::create([
            'name' => 'Product 10',
            'description' => 'Description of Product 10',
            'price' => 109.99,
        ]);
    }
}