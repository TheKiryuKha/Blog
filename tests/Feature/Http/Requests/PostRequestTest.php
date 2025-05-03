<?php

use App\Http\Requests\PostRequest;

test("Post has right validation rules", function(){

    $request = new PostRequest();
    
    expect($request->rules())->toMatchArray([
        'title' => ['required', 'string', 'min:3', 'max:100'],
        'image' => ['nullable', 'image'],
        'content' => ['required', 'string', 'min:3', 'max:255'],
        'categories' => 'array', 
        'categories.*' => 'exists:categories,id'
    ]);
});
