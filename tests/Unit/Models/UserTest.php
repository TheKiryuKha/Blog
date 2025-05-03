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
    $user = User::factory()->has(Comment::factory()->count(3))->create();

    expect($user->comments)->toHaveCount(3);
    expect($user->comments()->first())->toBeInstanceOf(Comment::class);
});