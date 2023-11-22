<?php

namespace Database\Factories;

use App\Models\Product;
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
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->paragraph(),
            'title' => $this->faker->name(),
            'url'  => $this->faker->url(),
            'seller'=> $this->faker->name(),
            'price' => random_int(100, 5000),
            'category_id' => random_int(1, 3),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        ];
    }
}
