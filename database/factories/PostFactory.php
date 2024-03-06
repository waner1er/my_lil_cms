<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = $this->faker->unique()->sentence;
        $users = \App\Models\User::all();

        return [
            'title' => $title ,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'image_alt' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'content' => $this->faker->paragraph,
            'user_id' => $users->random()->id,
        ];
    }
}
