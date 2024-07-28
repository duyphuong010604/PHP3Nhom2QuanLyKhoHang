<?php

namespace Database\Seeders;

use App\Models\Shelf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shelf::create([
            'name' => 'Shelf A',
            'section' => 'Section 1',
            'capacity' => '100kg',
            'status' => true,
        ]);

        Shelf::create([
            'name' => 'Shelf B',
            'section' => 'Section 2',
            'capacity' => '150kg',
            'status' => true,
        ]);
    }
}
