<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
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
            'title' => fake()->words(3, true),
            'user_id' => User::factory(),
            'content' => fake()->text(),
            'views' => 0,
            'likes' => 0,
            'status' => PostStatus::Simple
        ];
    }

    public function featured(): PostFactory
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatus::Featured,
        ]);
    }
}
