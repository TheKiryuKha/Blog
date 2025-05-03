<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

test('Admin creates post', function (){
    $admin = User::factory()->admin()->create();
    $categories = Category::factory()->count(3)->create();
    
    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->post(route('posts.store'), [
            'title' => 'Test',
            'content' => 'Test Post',
            'categories' => [
                $categories[0]->id,
                $categories[1]->id,
                $categories[2]->id,
            ]
        ]);

    $response->assertRedirectToRoute('posts.index');

    expect(Post::count())->toBe(1);

    expect(Post::first())
        ->title->toBe('Test')
        ->content->toBe('Test Post');

    expect(Post::first()->categories()->first())->toBeInstanceOf(Category::class);
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