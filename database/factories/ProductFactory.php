<?php

namespace Database\Factories;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
        return [
            'name' => $this->faker->randomElement([
                'Laptop',
                'Smartphone',
                'Tablet',
                'Camera',
                'Monitor',
                'Printer',
                'Router',
                'Switch',
                'Hub'
            ]),
            'price' => $this->faker->numberBetween(100, 9999),
            'status' => $this->faker->randomElement([
                ProductStatusEnum::IN_STOCK->value,
                ProductStatusEnum::SOLD_OUT->value,
                ProductStatusEnum::COMING_SOON->value
            ]),
            'category_id' => Category::factory(),
            'is_active' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
