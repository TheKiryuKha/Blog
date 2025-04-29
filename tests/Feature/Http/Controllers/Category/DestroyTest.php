<?php

use App\Models\Category;
use App\Models\User;

test('admin deletes category', function(){
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();
    
    $responce = $this->actingAs($admin)
        ->from(route('categories.index'))
        ->delete(route('categories.destroy', $category));

    $responce->assertRedirectToRoute('categories.index');

    expect(Category::all())->toHaveCount(0);
});