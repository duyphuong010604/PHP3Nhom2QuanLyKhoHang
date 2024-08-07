<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Shelf;



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
    public function definition(): array
    {
        $user = User::pluck('id')->toArray();
        $customer = Customer::pluck('id')->toArray();
        $shelf = Shelf::pluck('id')->toArray();

        return [

            'user_id' => $this->faker->randomElement($user),
            'customer_id' => $this->faker->randomElement($customer),
            'shelf_id' => $this->faker->randomElement($shelf),
            'totalAmount' => $this->faker->randomFloat(2, 0, 10000),
         'remarks' => $this->faker->word,
         'status' => $this->faker->randomElement(['active', 'draft']),
        ];
    }
}
