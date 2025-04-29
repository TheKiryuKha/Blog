<?php

use App\Models\Comment;
use App\Actions\DeleteComment;

it('deletes comment', function(){
    $comment = Comment::factory()->create();
    $action = app(DeleteComment::class);

    $action->handle($comment);

    expect(Comment::all())->toHaveCount(0);
});