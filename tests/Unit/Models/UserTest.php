<?php

use App\Models\Comment;
use App\Models\User;

test('to array', function(){

    $user = User::factory()->create()->fresh();

    expect(array_keys($user->toArray()))->toBe([
        'id',
        'name',
        'email',
        'avatar',
        'role',
        'email_verified_at',
        'created_at',
        'updated_at'
    ]);
});

test('Has comments', function(){

    $user = User::factory()->create()->fresh();
    $user->comments()->create([
        'content' => 'Nice Post!'
    ]);

    $user_comments = $user->comments()->get();

    expect($user_comments[0]->content)->toBe('Nice Post!');

});