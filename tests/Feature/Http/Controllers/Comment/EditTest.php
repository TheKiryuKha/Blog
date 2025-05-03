<?php

use App\Models\Comment;
use App\Models\User;

test('User can see edit page of his comment', function(){
    $user = User::factory()->create();
    $comment = Comment::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user)
        ->get(route('comments.edit', $comment))
        ->assertStatus(200);
});

test('User cannot see edit page of NOT his comment', function(){
    $user = User::factory()->create();
    $comment = Comment::factory()->create();

    $this->actingAs($user)
        ->get(route('comments.edit', $comment))
        ->assertStatus(403);
});