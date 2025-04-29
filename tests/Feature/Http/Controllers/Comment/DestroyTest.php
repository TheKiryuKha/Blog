<?php

use App\Models\Comment;
use App\Models\User;

test('user can delete comment', function(){
    $user = User::factory()->create();
    $comment = Comment::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)
        ->delete(route('comments.destroy', $comment));

    $response->assertStatus(302);

    expect(Comment::all())->toHaveCount(0);
});

test('admin can delete comment', function(){
    $admin = User::factory()->admin()->create();
    $comment = Comment::factory()->create();

    $response = $this->actingAs($admin)
        ->delete(route('comments.destroy', $comment));

    $response->assertStatus(302);

    expect(Comment::all())->toHaveCount(0);
});