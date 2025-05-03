<?php

use App\Models\Post;
use App\Models\User;
use App\Actions\CreatePost;

it('creates post', function(){
    $user = User::factory()->create();
    $action = app(CreatePost::class);

    $post = $action->handle($user, [
        'title' => 'Test',
        'content' => 'Nice Post!'
    ]);

    expect($post)
        ->toBeInstanceOf(Post::class)
        ->title->toBe('Test')
        ->content->toBe('Nice Post!');
    
    expect(Post::count())->toBe(1);
});