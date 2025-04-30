<?php

use App\Models\Post;
use App\Models\User;

test('Admin creates post', function (){
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

test('User cannot create post', function (){
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)
        ->from(route('posts.index'))
        ->post(route('posts.store'), [
            'title' => 'Test',
            'content' => 'Test Post'
        ]);

    $response->assertStatus(403);
});