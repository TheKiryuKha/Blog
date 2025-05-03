<?php

use App\Models\Post;
use App\Models\User;

test('Admin can delete his post', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create(['user_id' => $admin->id]);

    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->delete(route('posts.destroy', $post));

    $response->assertRedirectToRoute('posts.index');

    expect(Post::count())->toBe(0);
});

test('Admin cannot delete NOT his post', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->delete(route('posts.destroy', $post));

    $response->assertStatus(403);
});

test('User cannot delete post', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('posts.index'))
        ->delete(route('posts.destroy', $post));

    $response->assertStatus(403);
});