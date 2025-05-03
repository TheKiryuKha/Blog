<?php


use App\Http\Requests\CommentRequest;

test("Comment has right validation rules", function(){

    $request = new CommentRequest();
    
    expect($request->rules())->toMatchArray([
        'post_id' => ['nullable', 'integer', 'unique:posts'],
        'content' => ['required', 'string', 'min:1', 'max:200']
    ]);
});