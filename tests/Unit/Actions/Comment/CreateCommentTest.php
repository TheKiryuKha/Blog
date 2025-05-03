<?php

use App\Actions\CreateComment;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

it('creates comment', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $action = app(CreateComment::class);

    $comment = $action->handle($user,[
        'post_id' => $post->id,
        'content' => 'Nice Post!'
    ]);

    expect($comment)
        ->toBeInstanceOf(Comment::class)
        ->content->toBe('Nice Post!')
        ->user_id->toBe($user->id)
        ->post_id->toBe($post->id);
    
    expect(Comment::count())->toBe(1);
});