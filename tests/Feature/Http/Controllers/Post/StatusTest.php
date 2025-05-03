<?php

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;

test('Admin change post status to Featured', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create([
        'user_id' => $admin->id
    ]);

    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->get(route('posts.status', $post));

    $response->assertStatus(302);

    expect(Post::first()->status)->toBe(PostStatus::Featured);
});