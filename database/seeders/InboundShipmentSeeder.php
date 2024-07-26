<?php

namespace Database\Seeders;

use Database\Factories\InboundShipmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InboundShipments;

class InboundShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InboundShipments::factory(10)->create();
    }
}
