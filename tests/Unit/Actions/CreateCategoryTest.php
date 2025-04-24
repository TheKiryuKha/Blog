<?php

use App\Actions\CreateCategory;


it('creates category', function(){
    $action = app(CreateCategory::class);

    $category = $action->handle([
        'title' => 'title'
    ]);

    expect($category->title)->toBe('title');
});