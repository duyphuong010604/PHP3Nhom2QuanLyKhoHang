<?php

namespace Database\Factories;

use App\Models\OutboundShipment;
use App\Models\OutboundShipmentDetails;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutboundShipmentDetails>
 */
class OutboundShipmentDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OutboundShipmentDetails::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory()->nullable(), // Assuming you have a Product factory
            'outbound_shipment_id' => OutboundShipment::factory()->nullable(), // Link to OutboundShipment factory
            'quantity' => $this->faker->numberBetween(1, 100),
            'unitPrice' => $this->faker->randomFloat(2, 10, 1000),
            'totalPrice' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['unitPrice'];
            },
        ];
    }
}
