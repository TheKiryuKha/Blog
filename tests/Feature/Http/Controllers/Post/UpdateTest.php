<?php

use App\Models\Post;
use App\Models\User;

test('Admin can edit his post', function(){
    $user = User::factory()->admin()->create();
    $post = Post::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)
        ->from(route('posts.edit', $post))
        ->patch(route('posts.update', $post), [
            'title' => 'New Title!',
            'content' => 'New Post'
        ]);

    $response->assertRedirectToRoute('posts.index');

    $posts = Post::all();

    expect($posts)->toHaveCount(1)
        ->and($posts[0]->title)->toBe('New Title!')
        ->and($posts[0]->content)->toBe('New Post');
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