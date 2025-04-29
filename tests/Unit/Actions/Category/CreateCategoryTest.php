<?php

use App\Actions\CreateCategory;
use App\Models\Category;


it('creates category', function(){
    $action = app(CreateCategory::class);

    $category = $action->handle([
        'title' => 'Test'
    ]);

    expect(Category::all())->toHaveCount(1)
        ->and($category->title)->toBe('Test');
});