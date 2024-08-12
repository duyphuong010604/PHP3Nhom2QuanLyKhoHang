<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InboundShipment;
use App\Models\InboundShipmentDetails;
use App\Models\OutboundShipment;
use App\Models\OutboundShipmentDetails;
use App\Models\Product;
use App\Models\Shelf;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                $this->call(
                        [
                                CategorySeeder::class,
                                ShelfSeeder::class,
                        ]
                );
                // User::factory(10)->create();
                // Product::factory(10)->create();
                // Supplier::factory(10)->create();
                // InboundShipment::factory(10)->create();
                // InboundShipmentDetails::factory(10)->create();
                // // Stock::factory(10)->create();
                // Customer::factory(10)->create();
                // OutboundShipment::factory(10)->create();
                // OutboundShipmentDetails::factory(10)->create();

        }
}
