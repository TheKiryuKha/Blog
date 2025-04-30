<?php

use App\Models\Post;
use App\Models\User;

test('admin creates post', function (){
    $admin = User::factory()->admin()->create();
    
    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->post(route('posts.store'), [
            'title' => 'Test',
            'content' => 'Test Post'
        ]);

    $response->assertRedirectToRoute('posts.index');

    $posts = Post::all();

    expect($posts)->toHaveCount(1)
        ->and($posts[0]->title)->toBe('Test')
        ->and($posts[0]->content)->toBe('Test Post');
});