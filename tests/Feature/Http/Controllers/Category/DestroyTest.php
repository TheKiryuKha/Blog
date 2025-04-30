<?php

use App\Models\Category;
use App\Models\User;

test('Admin deletes category', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();
    
    $responce = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->delete(route('categories.destroy', $category));

    $responce->assertRedirectToRoute('categories.index');

    expect(Category::all())->toHaveCount(0);
});

test('Non admin cannot delete category', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();
    
    $responce = $this->actingAs($user)
        ->from(route('categories.index'))
        ->delete(route('categories.destroy', $category));

    $responce->assertStatus(403);
});