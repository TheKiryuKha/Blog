<?php

use App\Models\Category;
use App\Models\User;

test('Admin creates category', function(){

    $admin = User::factory()->admin()->create();

    $responce = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->post(route('categories.store'), [
            'title' => 'Test'
        ]);

    $responce->assertRedirectToRoute('categories.index');
    expect(Category::all())->toHaveCount(1)
        ->and(Category::first()->title)->toBe('Test');
});

test('non admin cannot create category', function(){

    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('categories.store'))
        ->assertStatus(403);
});