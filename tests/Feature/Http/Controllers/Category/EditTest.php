<?php

use App\Models\Category;
use App\Models\User;

test('Admin can see edit page', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();

    $this->actingAs($admin)
        ->get(route('categories.edit', $category))
        ->assertStatus(200);
});

test('Non admin cannot see edit page', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user)
        ->get(route('categories.edit', $category))
        ->assertStatus(403);
});