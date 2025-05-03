<?php

use App\Models\Post;
use App\Actions\DeletePost;

it('deletes post', function(){
    $post = Post::factory()->create();
    $action = app(DeletePost::class);

    $action->handle($post);

    expect(Post::count())->toBe(0);
});