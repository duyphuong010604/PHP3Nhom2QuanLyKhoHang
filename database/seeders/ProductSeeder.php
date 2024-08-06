<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1, // Giả định rằng danh mục này đã tồn tại
            'sku' => 'PROD001',
            'name' => 'Smartphone',
            'price' => 299.99,
            'cost' => 199.99,
            'description' => 'A high-quality smartphone with advanced features.',
            'imageUrl' => 'images/products/smartphone.jpg',
            'dimensions' => '15x7x0.8 cm',
            'weight' => 0.2,
            'status' => true,
        ]);

        Product::create([
            'category_id' => 2, // Giả định rằng danh mục này đã tồn tại
            'sku' => 'PROD002',
            'name' => 'Office Chair',
            'price' => 149.99,
            'cost' => 89.99,
            'description' => 'Ergonomic office chair with adjustable height.',
            'imageUrl' => 'images/products/office_chair.jpg',
            'dimensions' => '120x60x60 cm',
            'weight' => 15.0,
            'status' => true,
        ]);

        Product::create([
            'category_id' => 3, // Giả định rằng danh mục này đã tồn tại
            'sku' => 'PROD003',
            'name' => 'Men\'s T-Shirt',
            'price' => 19.99,
            'cost' => 9.99,
            'description' => 'Comfortable cotton t-shirt available in various sizes.',
            'imageUrl' => 'images/products/tshirt.jpg',
            'dimensions' => '30x20x0.5 cm',
            'weight' => 0.2,
            'status' => true,
        ]);

    }
}
