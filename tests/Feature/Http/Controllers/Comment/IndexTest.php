<?php

use App\Models\User;

test('Admin can see list of comments', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('comments.index'))
        ->assertStatus(200);
});

test('Non admin cannot see list of comments', function(){
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('comments.index'))
        ->assertStatus(403);
});