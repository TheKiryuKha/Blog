<?php

use App\Enums\PostStatus;
use App\Models\Post;
use App\Actions\TogglePostStatus;

it('toggles post status between Simple and Featured', function(){
    $simple_post = Post::factory()->create();
    $featured_post = Post::factory()->featured()->create();
    $action = app(TogglePostStatus::class);

    $action->handle($simple_post);
    $action->handle($featured_post);

    expect($simple_post->fresh()->status)->toBe(PostStatus::Featured)
        ->and($featured_post->fresh()->status)->toBe(PostStatus::Simple);
});