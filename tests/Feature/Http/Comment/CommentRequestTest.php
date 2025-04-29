<?php


use App\Http\Requests\CommentRequest;

test("POST connection uses right validation rules", function(){

    $request = CommentRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'content' => ['required', 'string', 'min:1', 'max:200']
    ]);
});

test('PATCH connection uses right validation rules', function(){
    
    $request = CommentRequest::create(
        '',
        'PATCH'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:categories,id'],
        'content' => ['required', 'string', 'min:1', 'max:200']
    ]);
});

test('DELETE connection uses right validation rules', function(){
    $request = CommentRequest::create(
        '',
        'DELETE'
    );
    
    expect($request->rules())->toBe([
        'id' => ['required', 'integer', 'unique:categories,id']
    ]);
});