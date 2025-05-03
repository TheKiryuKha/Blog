<?php

use App\Models\Category;
use App\Actions\DeleteCategory;

it('deletes category', function(){
    $category = Category::factory()->create();
    $action = app(DeleteCategory::class);

    $action->handle($category);

    expect(Category::count())->toBe(0);
});