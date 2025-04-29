<?php

use App\Models\Comment;
use App\Models\User;

test('user can edit his comment', function()
{
    $user = User::factory()->create();
    $comment = Comment::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)
        ->patch(route('comments.update', $comment), [
            'content' => 'New Content!'
        ]);

    $response->assertStatus(302);

    expect(Comment::all())->toHaveCount(1)
        ->and(Comment::first()->content)->toBe('New Content!');
});