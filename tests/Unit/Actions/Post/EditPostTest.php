<?php

use App\Models\Post;
use App\Actions\EditPost;

it('edits post', function(){
    $post = Post::factory()->create();
    $action = app(EditPost::class);

    $action->handle($post, [
        'title' => 'new title'
    ]);

    expect($post->title)->toBe('new title');
});