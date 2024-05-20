<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->name(),
            'status' => fake()->name(),
            'url' => fake()->name(),
            'creator' => fake()->name(),
            'product_name' => fake()->name(),
            'quantity' => fake()->name(),
            'brands' => fake()->name(),
            'categories' => fake()->name(),
            'labels' => fake()->name(),
            'cities' => fake()->name(),
            'purchase_places' => fake()->name(),
            'stores' => fake()->name(),
            'ingredients_text' => fake()->name(),
            'traces' => fake()->name(),
            'serving_size' => fake()->name(),
            'serving_quantity' => fake()->name(),
            'nutriscore_score' => fake()->name(),
            'nutriscore_grade' => fake()->name(),
            'main_category' => fake()->name(),
            'image_url' => fake()->name(),
        ];
    }
}
