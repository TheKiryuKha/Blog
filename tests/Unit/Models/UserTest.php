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
    Comment::factory()->count(3)->create([
        'user_id' => $user->id
    ]);

    expect($user->comments)->toHaveCount(3);

});