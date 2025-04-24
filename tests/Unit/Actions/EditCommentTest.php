<?php

use App\Models\Comment;
use App\Actions\EditComment;


it('can edit comment', function (){

    $comment = Comment::factory()->create()->fresh();
    $action = app(EditComment::class);

    $action->handle($comment, [
        'content' => 'new Nice Post!'
    ]);

    expect($comment->content)->toBe('new Nice Post!');
});