<?php

namespace Database\Factories;

use App\Models\InboundShipments;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Shelf;
use Illuminate\Database\Eloquent\Factories\Factory;

class InboundShipmentsFactory extends Factory
{
    protected $model = InboundShipments::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'supplier_id' => Supplier::factory(),
            'shelf_id' => Shelf::factory(),
            'totalAmount' => $this->faker->randomFloat(2, 100, 1000),
            'remarks' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'draft']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
