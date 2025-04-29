<?php

use App\Models\User;
use App\Actions\CreatePost;

it('creates post', function(){
    
    $user = User::factory()->create();
    $action = app(CreatePost::class);

    $post = $action->handle($user, [
        'title' => 'Test',
        'content' => 'Nice Post!'
    ]);

    expect($post->title)->toBe('Test')
        ->and($post->content)->toBe('Nice Post!');
});