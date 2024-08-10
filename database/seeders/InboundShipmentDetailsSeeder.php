<?php

namespace Database\Seeders;

use App\Models\InboundShipmentDetails;
use Database\Factories\InboundShipmentDetailsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InboundShipmentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InboundShipmentDetails::factory(5)->create();
    }
}
