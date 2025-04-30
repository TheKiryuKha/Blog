<?php

use App\Models\User;

test('Admin can see list of all posts', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('posts.index'))
        ->assertStatus(200);
});

test('Non admin cannot see list of all posts', function(){
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('posts.index'))
        ->assertStatus(403);
});