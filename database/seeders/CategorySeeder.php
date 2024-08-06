<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'description' => 'Devices and gadgets such as phones, computers, and more.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Furniture',
            'description' => 'Various kinds of furniture for home and office.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel including men\'s, women\'s, and children\'s clothing.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Books',
            'description' => 'A collection of fiction, non-fiction, and educational books.',
            'status' => true,
        ]);

        Category::create([
            'name' => 'Sports Equipment',
            'description' => 'Gear and accessories for various sports.',
            'status' => false,
        ]);
    }
}
