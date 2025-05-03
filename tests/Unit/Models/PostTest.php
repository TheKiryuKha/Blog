<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

test('to array', function(){
    $post = Post::factory()->create()->fresh();

    expect(array_keys($post->toArray()))->toBe([
        'id',
        'user_id',
        'title',
        'image',
        'content',
        'status',
        'views',
        'likes',
        'created_at',
        'updated_at'
    ]);
});

it('has comments', function(){
    $post = Post::factory()->has(Comment::factory()->count(3))->create();

    expect($post->comments)->toHaveCount(3);
    expect($post->comments()->first())->toBeInstanceOf(Comment::class);
});

test('Belongs to user', function(){
    $post = Post::factory()->has(User::factory())->create();

    expect($post->user)->toBeInstanceOf(User::class);
});