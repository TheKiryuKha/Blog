<?php

use App\Models\Post;
use App\Models\User;
use App\Actions\ViewPost;

test('user can see post and post views updates', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->get(route('posts.show', $post));

    $response->assertStatus(200);

    expect(Post::first()->views)->toBe(1);
});

test('Re-viewing does not affect history', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $action = app(ViewPost::class);

    $action->handle($user, $post);

    $response = $this->actingAs($user)
        ->get(route('posts.show', $post));
    
    $response->assertStatus(200);

    expect(Post::first()->views)->toBe(1);
});