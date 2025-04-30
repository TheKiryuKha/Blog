<?php

use App\Models\User;

test('Admin can see create page', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('posts.create'))
        ->assertStatus(200);
});

test('User cannot see create page', function(){
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('posts.create'))
        ->assertStatus(403);
});