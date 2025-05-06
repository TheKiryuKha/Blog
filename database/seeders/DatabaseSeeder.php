<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admins = User::factory()
            ->admin()
            ->count(3)
            ->create();

        $users = User::factory()
            ->count(7)
            ->create();

        $categories = Category::factory()
            ->count(10)
            ->create();

        $posts = Post::factory()
            ->count(50)
            ->create([
                'user_id' => fn() => $admins->random()->id
            ]);

        $posts->each(function($post) use ($categories){
            $post->categories()->attach(
                $categories->random(rand(1, 5))->pluck('id')
            );
        });

        Comment::factory()
            ->count(200)
            ->create([
                'post_id' => fn() => $posts->random()->id,
                'user_id' => fn() => $users->random()->id
            ]);
    }
}
