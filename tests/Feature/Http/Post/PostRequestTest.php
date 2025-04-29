<?php

use App\Http\Requests\PostRequest;

test("POST connection uses right validation rules", function(){

    $request = PostRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'image' => ['nullable', 'image'],
        'content' => ['required', 'string', 'min:3', 'max:255']
    ]);
});

test('PATCH connection uses right validation rules', function(){
    
    $request = PostRequest::create(
        '',
        'PATCH'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:posts,id'],
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'image' => ['nullable', 'image'],
        'content' => ['required', 'string', 'min:3', 'max:255']
    ]);
});

test('DELETE connection uses right validation rules', function(){
    $request = PostRequest::create(
        '',
        'DELETE'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:posts,id']
    ]);
});
