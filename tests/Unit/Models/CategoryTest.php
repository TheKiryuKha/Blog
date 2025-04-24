<?php

use App\Models\Category;

test('to array', function(){
    
    $user = Category::factory()->create()->fresh();

    expect(array_keys($user->toArray()))->toBe([
        'id',
        'title',
        'created_at',
        'updated_at'
    ]);
});