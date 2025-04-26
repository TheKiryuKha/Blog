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
    $comment = Comment::factory()->create([
        'post_id' => $post,
        'content' => 'Nice Post!'
    ]);

    $user_comments = $post->comments()->get();

    expect($user_comments[0]->content)->toBe('Nice Post!');

});

test('Belongs to user', function(){

    $user = User::factory()->create([
        'name' => 'Igor'
    ]);

    $post = Post::factory()->create([
        'user_id' => $user->id
    ]);

    expect($post->user->name)->toBe('Igor');

});