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

    $post = Post::factory()->create();
    Comment::factory()->count(3)->create([
        'post_id' => $post
    ]);

    expect($post->comments)->toHaveCount(3);
});

test('Belongs to user', function(){

    $user = User::factory()->create();
    $post = Post::factory()->create([
        'user_id' => $user->id
    ]);

    expect($post->user)->toBeInstanceOf(User::class);
});