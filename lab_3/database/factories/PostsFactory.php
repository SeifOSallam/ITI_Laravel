<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = 'default.png';
        return [
            'title' => fake()->sentence(),
            'body' => substr(fake()->paragraph(), 0, 100),
            'image' => $image,
            'author' => rand(2,11),
        ];
    }
}
