<?php

use App\Models\Comment;
use App\Models\User;

test('to array', function(){

    $comment = Comment::factory()->create()->fresh();

    expect(array_keys($comment->toArray()))->toBe([
        'id',
        'user_id',
        'content',
        'created_at',
        'updated_at'
    ]);
});

test('Belongs to user', function(){

    $user = User::factory()->create([
        'name' => 'Igor'
    ])->fresh();

    $comment = Comment::factory()->create([
        'user_id' => $user->id
    ]);

    expect($comment->user->name)->toBe('Igor');

});