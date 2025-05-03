<?php

use App\Http\Requests\CategoryRequest;

test("Category has right validation rules", function(){

    $request = new CategoryRequest();
    
    expect($request->rules())->toMatchArray([
        'title' => ['required', 'string', 'min:1', 'max:20']
    ]);
});

