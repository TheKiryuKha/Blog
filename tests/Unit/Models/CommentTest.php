<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

test('to array', function(){
    $comment = Comment::factory()->create()->fresh();

    expect(array_keys($comment->toArray()))->toBe([
        'id',
        'user_id',
        'post_id',
        'content',
        'created_at',
        'updated_at'
    ]);
});

it('Belongs to user', function(){
    $comment = Comment::factory()->has(User::factory())->create();

    expect($comment->user)->toBeInstanceOf(User::class);
});

it('Belongs to post', function(){
    $comment = Comment::factory()->has(Post::factory())->create();

    expect($comment->post)->toBeInstanceOf(Post::class);
});