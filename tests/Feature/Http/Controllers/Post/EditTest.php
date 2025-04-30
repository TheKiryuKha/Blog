<?php

use App\Models\Post;
use App\Models\User;

test('Admin can see edit page of his post', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create([
        'user_id' => $admin->id
    ]);

    $this->actingAs($admin)
        ->get(route('posts.edit', $post))
        ->assertStatus(200);
})->only();

test('Admin cannot see edit page of NOT his post', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create();

    $this->actingAs($admin)
        ->get(route('posts.edit', $post))
        ->assertStatus(403);
})->only();

test('User cannot see edit post page', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $this->actingAs($user)
        ->get(route('posts.edit', $post))
        ->assertStatus(403);
})->only();