<?php

namespace Database\Factories;

use App\Models\InboundShipment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InboundShipmentDetailsFactory extends Factory
{
    protected $model = InboundShipmentDetails::class;

    public function definition()
    {
        $product = Product::pluck('id')->toArray();
        $inboundShipment = InboundShipment::pluck('id')->toArray();
        return [
            'product_id' => $this->faker->randomElement($product),
            'inbound_shipment_id' => $this->faker->randomElement($inboundShipment),
            'quantity' => $this->faker->numberBetween(1, 10),
            'unitPrice' => $this->faker->randomFloat(2, 10, 100),
            'totalPrice' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
