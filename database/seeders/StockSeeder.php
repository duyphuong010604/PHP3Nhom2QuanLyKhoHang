<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;


class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'product_id' => 2, // ID hợp lệ từ bảng products
            'shelf_id' => 11,   // ID hợp lệ từ bảng shelves
            'quantity' => 50,
            'status' => true,
        ]);

        Stock::create([
            'product_id' => 3, // ID hợp lệ từ bảng products
            'shelf_id' => 12,   // ID hợp lệ từ bảng shelves
            'quantity' => 75,
            'status' => false,
        ]);

        Stock::create([
            'product_id' => 2, // ID hợp lệ từ bảng products
            'shelf_id' => 13,   // ID hợp lệ từ bảng shelves
            'quantity' => 75,
            'status' => false,
        ]);

        Stock::create([
            'product_id' => 4, // ID hợp lệ từ bảng products
            'shelf_id' => 14,   // ID hợp lệ từ bảng shelves
            'quantity' => 75,
            'status' => false,
        ]);
    }
}
