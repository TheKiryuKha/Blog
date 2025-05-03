<?php

use App\Models\Post;
use App\Models\User;
use App\Actions\ViewPost;

test('User like the post', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $action = app(ViewPost::class);
    $action->handle($user, $post);

    $response = $this->actingAs($user)
        ->from(route('posts.show', $post))
        ->get(route('posts.like', $post));

    $response->assertStatus(302);

    expect(Post::first()->likes)->toBe(1);
});

test('User dislike the post', function(){
    $user = User::factory()->create();
    $post = Post::factory()->create(['likes' => 1]);
    $action = app(ViewPost::class);
    $action->handle($user, $post);

    DB::table('history')
                ->where('post_id', $post->id)
                ->where('user_id', $user->id)
                ->update([
                    'is_liked' => true
                ]);


    $response = $this->actingAs($user)
        ->from(route('posts.show', $post))
        ->get(route('posts.like', $post));
    
    $response->assertStatus(302);

expect(Post::first()->likes)->toBe(0);
});