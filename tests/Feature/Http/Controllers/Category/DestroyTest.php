<?php

use App\Models\Category;
use App\Models\User;

test('Admin deletes category', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();
    
    $responce = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->delete(route('categories.destroy', $category));

    $responce->assertStatus(302);

    expect(Category::count())->toBe(0);
});

test('Non admin cannot delete category', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();
    
    $responce = $this->actingAs($user)
        ->from(route('categories.index'))
        ->delete(route('categories.destroy', $category));

    $responce->assertStatus(403);
});