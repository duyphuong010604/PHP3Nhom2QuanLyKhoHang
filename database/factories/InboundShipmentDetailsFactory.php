<?php

namespace Database\Factories;

use App\Models\InboundShipmentDetails;
use App\Models\Product;
use App\Models\InboundShipments;
use Illuminate\Database\Eloquent\Factories\Factory;

class InboundShipmentDetailsFactory extends Factory
{
    protected $model = InboundShipmentDetails::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'inbound_shipments_id' => InboundShipments::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unitPrice' => $this->faker->randomFloat(2, 10, 100),
            'totalPrice' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['unitPrice'];
            },
            
        ];
    }
}
