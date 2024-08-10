<?php

namespace Database\Seeders;

use App\Models\InboundShipment;
use Database\Factories\InboundShipmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InboundShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InboundShipment::factory(5)->create();
    }
}
