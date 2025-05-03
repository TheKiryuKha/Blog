<?php

use App\Http\Requests\PostRequest;

test("Post has right validation rules", function(){

    $request = PostRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'image' => ['nullable', 'image'],
        'content' => ['required', 'string', 'min:3', 'max:255'],
        'categories' => 'array', 
        'categories.*' => 'exists:categories,id'
    ]);
});
