<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        // Tạo giá gốc (cost) đầu tiên
        $cost = $this->faker->randomFloat(2, 1, 500);

        // Tạo giá bán (price) sao cho luôn lớn hơn hoặc bằng giá gốc
        $price = $this->faker->randomFloat(2, $cost, 1000);
        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'sku' => $this->faker->unique()->bothify('SKU-###-###'),
            'name' => $this->faker->name(),
            'price' => $price,
            'cost' => $cost,
            'description' => $this->faker->sentence,
            'imageUrl' => $this->faker->imageUrl,
            'dimensions' => $this->faker->word,
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'status' => $this->faker->boolean
        ];
    }
}
