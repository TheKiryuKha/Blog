<?php

use App\Models\Category;
use App\Models\User;

test('admin edits category', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();

    $response = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->patch(route('categories.update', $category), [
            'title' => 'New Title'
        ]);

    $response->assertStatus(302);

    expect(Category::count())->toBe(1)
        ->and(Category::first()->title)->toBe('New Title');
});

test('Non admin cannot edit category', function(){

    $user = User::factory()->create();
    $category = Category::factory()->create();

    $response = $this->actingAs($user)
        ->from(route('categories.index'))
        ->patch(route('categories.update', $category), [
            'title' => 'New Title'
        ]);

    $response->assertStatus(403);
});