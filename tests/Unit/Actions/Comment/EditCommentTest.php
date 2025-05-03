<?php

use App\Models\Comment;
use App\Actions\EditComment;

it('edits comment', function (){
    $comment = Comment::factory()->create();
    $action = app(EditComment::class);

    $action->handle($comment, [
        'content' => 'new Nice Post!'
    ]);

    expect($comment)
        ->content->toBe('new Nice Post!');
});