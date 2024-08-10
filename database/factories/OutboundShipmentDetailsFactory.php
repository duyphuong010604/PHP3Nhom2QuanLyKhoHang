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
        $product = Product::pluck('id')->toArray();
        $outbound = OutboundShipment::pluck('id')->toArray();
        return [
            'product_id' => $this->faker->randomElement($product),
            'outbound_shipment_id' => $this->faker->randomElement($outbound),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unitPrice' => $this->faker->randomFloat(2, 10, 1000),
            'totalPrice' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['unitPrice'];
            },
        ];
    }
}
