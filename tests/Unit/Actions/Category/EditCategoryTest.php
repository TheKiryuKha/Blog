<?php

use App\Models\Category;
use App\Actions\EditCategory;

it('edits category', function(){
    $category = Category::factory()->create();
    $action = app(EditCategory::class);

    $action->handle($category, [
        'title' => 'newTitle'
    ]);

    expect($category->title)->toBe('newTitle');
});