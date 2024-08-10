<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InboundShipment>
 */
class InboundShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::pluck('id')->toArray();
        $supplier = Supplier::pluck('id')->toArray();
        $shelf = Supplier::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($user),
            'supplier_id' => $this->faker->randomElement($supplier),
            'shelf_id' => $this->faker->randomElement($shelf),
            'totalAmount' => $this->faker->randomFloat(2, 0, 10000),
            'remarks' => $this->faker->word,
            'status' => $this->faker->randomElement(['active', 'draft']),
        ];
    }
}
