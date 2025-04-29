<?php

use App\Models\Post;
use App\Models\User;

test('Admin can delete his post', function(){
    $admin = User::factory()->admin()->create();
    $post = Post::factory()->create([
        'user_id' => $admin->id
    ]);

    $response = $this->actingAs($admin)
        ->from(route('posts.index'))
        ->delete(route('posts.destroy', $post));

    $response->assertRedirectToRoute('posts.index');

    expect(Post::all())->toHaveCount(0);
});