<?php

namespace Database\Factories;

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'post_id' => Post::factory(),   // attaches each comment to a post
            'user_id' => User::factory(),
            'content' => $this->faker->sentence(12),
        ];
    }
}
