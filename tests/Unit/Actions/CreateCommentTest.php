<?php

use App\Actions\CreateComment;
use App\Models\User;

it('creates comment', function(){
    $user = User::factory()->create()->fresh();
    $action = app(CreateComment::class);

    $comment = $action->handle($user, [
        'content' => 'Nice Post!'
    ]);

    expect($comment->content)->toBe('Nice Post!');
});