<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'image' => $this->faker->url(),
            'category_id' => $this->faker->numberBetween(1, 10),
            'tags' => 'laravel, react, api, backend, css',
            'description' => $this->faker->paragraph(),
        ];
    }
}
