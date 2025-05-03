<?php

use App\Models\Comment;
use App\Models\User;

test('user can edit his comment', function()
{
    $user = User::factory()->create();
    $comment = Comment::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)
        ->patch(route('comments.update', $comment), [
            'content' => 'New Content!'
        ]);

    $response->assertStatus(302);

    expect(Comment::count())->toBe(1)
        ->and(Comment::first()->content)->toBe('New Content!');
});

test('user cannot edit NOT his comment', function()
{
    $user = User::factory()->create();
    $comment = Comment::factory()->create();

    $response = $this->actingAs($user)
        ->patch(route('comments.update', $comment), [
            'content' => 'New Content!'
        ]);

    $response->assertStatus(403);
});