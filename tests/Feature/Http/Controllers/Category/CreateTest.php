<?php

use App\Models\User;

test('admin can see create page', function(){
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('categories.create'))
        ->assertStatus(200);
});