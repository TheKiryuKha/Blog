<?php

use App\Models\Category;
use App\Models\User;


test('user can see category', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user)
        ->get(route('categories.show', $category))
        ->assertStatus(200);
});