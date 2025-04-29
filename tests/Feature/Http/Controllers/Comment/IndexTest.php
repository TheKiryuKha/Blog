<?php

use App\Enums\UserRole;
use App\Models\User;

test('Admin can see list of comments', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('comments.index'))
        ->assertStatus(200);
});