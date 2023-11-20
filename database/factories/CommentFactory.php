<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'post_id' => Post::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->paragraph,
            'likes_count' => $this->faker->numberBetween(0, 10),
            'dislikes_count' => $this->faker->numberBetween(0, 5),
        ];
    }
}
