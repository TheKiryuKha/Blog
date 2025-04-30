<?php

use App\Models\Category;
use App\Models\User;

test('admin can see create page', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('categories.create'))
        ->assertStatus(200);
});

test('Non admin cannot see create page', function (){
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('categories.create'))
        ->assertStatus(403);
});