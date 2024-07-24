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
            'category_id' => 1,
            'sku' => 'darrre',
            'name' => 'sanphamq',
            'price' => 3223,
            'cost' => 2323,
            'description' => 'mota',
            'imageUrl' => 'url',
            'dimensions' => '43x23',
            'weight' => 13,
            'status' => true
        ]);
    }
}
