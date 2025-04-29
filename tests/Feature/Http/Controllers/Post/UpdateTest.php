<?php

use App\Models\Post;
use App\Models\User;

test('user can edit his post', function(){
    $user = User::factory()->admin()->create();
    $post = Post::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)
        ->from(route('posts.edit', $post))
        ->patch(route('posts.update', $post), [
            'title' => 'New Title!',
            'content' => 'New Post'
        ]);

    $response->assertRedirectToRoute('posts.index');

    $posts = Post::all();

    expect($posts)->toHaveCount(1)
        ->and($posts[0]->title)->toBe('New Title!')
        ->and($posts[0]->content)->toBe('New Post');
});