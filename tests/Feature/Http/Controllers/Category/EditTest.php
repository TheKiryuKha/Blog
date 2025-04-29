<?php

use App\Models\Category;
use App\Models\User;

test('admin can see edit page', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();

    $this->actingAs($admin)
        ->get(route('categories.edit', $category))
        ->assertStatus(200);
});