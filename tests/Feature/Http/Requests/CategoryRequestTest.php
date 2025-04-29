<?php

use App\Http\Requests\CategoryRequest;

test("Category has right validation rules", function(){

    $request = CategoryRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'title' => ['required', 'string', 'min:1', 'max:20']
    ]);
});

