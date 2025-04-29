<?php

use App\Http\Requests\CategoryRequest;

test("POST connection uses right validation rules", function(){

    $request = CategoryRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'title' => ['required', 'string', 'min:1', 'max:20']
    ]);
});

test('PATCH connection uses right validation rules', function(){
    
    $request = CategoryRequest::create(
        '',
        'PATCH'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:categories,id'],
        'title' => ['required', 'string', 'min:1', 'max:20']
    ]);
});

test('DELETE connection uses right validation rules', function(){
    $request = CategoryRequest::create(
        '',
        'DELETE'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:categories,id']
    ]);
});