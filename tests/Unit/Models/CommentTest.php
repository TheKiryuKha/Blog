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

    $user = User::factory()->create([
        'name' => 'Igor'
    ])->fresh();

    $comment = Comment::factory()->create([
        'user_id' => $user->id
    ]);

    expect($comment->user->name)->toBe('Igor');

});

it('Belongs to post', function(){

    $post = Post::factory()->create([
        'title' => 'Post'
    ]);

    $comment = Comment::factory()->create([
        'post_id' => $post->id
    ]);

    expect($comment->post->title)->toBe('Post');

});