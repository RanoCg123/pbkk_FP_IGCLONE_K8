<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(), // Associate the post with a user
            'image' => $this->faker->imageUrl,
            'title' => $this->faker->sentence,
            'caption' => $this->faker->paragraph,
        ];
    }
}
