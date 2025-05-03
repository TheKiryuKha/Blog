<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

test('user creates comment', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('comments.index'))
        ->post(route('comments.store'), [
            'post_id' => $post->id,
            'content' => 'Nice Post!'
        ]);
    
    $response->assertStatus(302);

    expect(Comment::count())->toBe(1)
        ->and(Comment::first()->content)->toBe('Nice Post!');
});