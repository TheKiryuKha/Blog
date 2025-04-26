<?php

use App\Actions\CreateComment;
use App\Models\Post;
use App\Models\User;

it('creates comment', function(){
    $user = User::factory()->create()->fresh();
    $post = Post::factory()->create()->fresh();
    $action = app(CreateComment::class);

    $comment = $action->handle($user,$post, [
        'content' => 'Nice Post!'
    ]);

    expect($comment->content)->toBe('Nice Post!')
        ->and($comment->user_id)->toBe($user->id)
        ->and($comment->post_id)->toBe($post->id);
});