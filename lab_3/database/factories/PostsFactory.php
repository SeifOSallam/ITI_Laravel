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
        $title = fake()->sentence();
        $body = substr(fake()->paragraph(), 0, 100);
        $image = 'default.png';
        $slug = str_slug($title);
        $authorId = rand(2,11);

        return [
            'title' => $title,
            'body' => $body,
            'image' => $image,
            'slug' => $slug,
            'author' => $authorId,
        ];
    }
}
