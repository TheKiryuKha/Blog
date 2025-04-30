<?php

use App\Enums\UserRole;
use App\Models\User;

test('Admin can see list of categories', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('categories.index'))
        ->assertStatus(200);
});

test('Non admin cannot see list of categories', function(){
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('categories.index'))
        ->assertStatus(403);
});