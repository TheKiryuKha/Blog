<?php

use App\Models\Category;
use App\Models\User;

test('admin edits category', function(){

    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();

    $response = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->patch(route('categories.update', $category), [
            'title' => 'New Title'
        ]);

    $response->assertRedirectToRoute('categories.index');

    expect(Category::all())->toHaveCount(1)
        ->and(Category::first()->title)->toBe('New Title');
});