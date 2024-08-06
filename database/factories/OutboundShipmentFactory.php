<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OutboundShipment;
use App\Models\User;
use App\Models\Shelf;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutboundShipment>
 */
class OutboundShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OutboundShipment::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->nullable(), // Assuming you have a User factory
            'customer_id' => Customer::factory()->nullable(), // Assuming you have a Customer factory
            'shelf_id' => Shelf::factory()->nullable(), // Assuming you have a Shelf factory
            'totalAmount' => $this->faker->randomFloat(2, 100, 10000),
            'remarks' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'draft']),
        ];
    }
}
