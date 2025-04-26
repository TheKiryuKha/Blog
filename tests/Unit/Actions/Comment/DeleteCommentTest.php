<?php

use App\Models\Comment;
use App\Actions\DeleteComment;

it('deletes comment', function(){
    $comment = Comment::factory()->create()->fresh();
    $action = app(DeleteComment::class);

    $action->handle($comment);

    expect(Comment::find($comment->id))->toBeNull();
});