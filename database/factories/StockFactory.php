<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Shelf;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::pluck('id')->toArray();
        $shelf = Shelf::pluck('id')->toArray();
        return [
            'product_id' => $this->faker->randomElement($product),
            'shelf_id' => $this->faker->randomElement($shelf),
            'quantity' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->boolean(),
        ];
    }
}
