<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

test('Admin can edit his post', function(){
    $user = User::factory()->admin()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);
    $categories = Category::factory()->count(3)->create();

    $response = $this->actingAs($user)
        ->from(route('posts.edit', $post))
        ->patch(route('posts.update', $post), [
            'title' => 'New Title!',
            'content' => 'New Post',
            'categories' => [
                $categories[0]->id,
                $categories[1]->id,
                $categories[2]->id
            ]
        ]);

    $response->assertRedirectToRoute('posts.index');

    expect(Post::count())->toBe(1);

    expect(Post::first())
        ->title->toBe('New Title!')
        ->content->toBe('New Post');

    expect(Post::first()->categories()->first())->toBeInstanceOf(Category::class);
});

test('Admin cannot edit NOT his post', function(){
    $user = User::factory()->admin()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('posts.edit', $post))
        ->patch(route('posts.update', $post), [
            'title' => 'New Title!',
            'content' => 'New Post'
        ]);

    $response->assertStatus(403);
});

test('User cannot edit post', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('posts.edit', $post))
        ->patch(route('posts.update', $post), [
            'title' => 'New Title!',
            'content' => 'New Post'
        ]);

    $response->assertStatus(403);
});