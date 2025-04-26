<?php

use App\DTO\PostDTO;
use App\Models\User;
use App\Actions\CreatePost;

it('creates post', function(){
    
    $user = User::factory()->create()->fresh();
    $action = app(CreatePost::class);

    $post = $action->handle(new PostDTO(
        'Post',
        'Nice Post!',
        $user
    ));

    expect($post->title)->toBe('Post')
        ->and($post->content)->toBe('Nice Post!');
});