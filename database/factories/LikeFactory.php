<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Like::class;

    public function definition()
    {
        $likeableType = $this->faker->randomElement([Post::class, Comment::class]);
        $likeableId = $likeableType::inRandomOrder()->first()->id;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'likeable_id' => $likeableId,
            'likeable_type' => $likeableType,
        ];
    }
}
