<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence(6),  // Generates a fake title with ~6 words
            'content' => $this->faker->paragraphs(3, true), // Generates 3 paragraphs as a single string
            'user_id' => User::factory(), // Automatically creates a user and assigns its IDs
        ];
    }
}
