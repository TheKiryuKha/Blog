<?php

use App\Models\Post;
use App\Models\User;

test('user can see post and post views updates', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('posts.index'))
        ->get(route('posts.show', $post));

    $response->assertStatus(200);

    expect(Post::first()->views)->toBe(1);
});