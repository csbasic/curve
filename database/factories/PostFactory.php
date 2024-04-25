<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    private static $category_id = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        return [
            'title' => $this->faker->sentence(),
            'category_id' => self::$category_id++,
            'tags' => 'laravel, react, api, backend, css',
            'description' => $this->faker->paragraph(),
        ];
    }
}
