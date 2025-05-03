<?php

use App\Actions\CreateCategory;
use App\Models\Category;


it('creates category', function(){
    $action = app(CreateCategory::class);

    $category = $action->handle([
        'title' => 'Test'
    ]);

    expect($category)
        ->toBeInstanceOf(Category::class)
        ->title->toBe('Test');
    
    expect(Category::count())->toBe(1);
});