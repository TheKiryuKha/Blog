<?php


use App\Http\Requests\CommentRequest;

test("Comment has right validation rules", function(){

    $request = CommentRequest::create(
        '',
        'POST'
    );
    
    expect($request->rules())->toBe([
        'content' => ['required', 'string', 'min:1', 'max:200']
    ]);
});