<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Dummy data for products
        $productsData = [
            ['name' => 'Product 1', 'description' => 'Description for Product 1', 'price' => 19.99],
            ['name' => 'Product 2', 'description' => 'Description for Product 2', 'price' => 29.99],
            ['name' => 'Product 3', 'description' => 'Description for Product 3', 'price' => 39.99],
            ['name' => 'Product 4', 'description' => 'Description for Product 4', 'price' => 49.99],
            ['name' => 'Product 5', 'description' => 'Description for Product 5', 'price' => 59.99],
            ['name' => 'Product 6', 'description' => 'Description for Product 6', 'price' => 69.99],
        ];

        // Insert dummy products into the database
        foreach ($productsData as $productData) {
            Product::create($productData);
        }
    }
}
