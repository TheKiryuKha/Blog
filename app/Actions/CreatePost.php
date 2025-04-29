<?php

namespace App\Actions;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageManager;
use DB;

final class CreatePost{
    public function handle(User $user, array $attr): Post
    {
        return DB::transaction(function() use($user, $attr){

            $post = new Post($attr);
            $post->user_id = $user->id;
            $post->views = 0;
            $post->likes = 0;
            $post->status = PostStatus::Simple;
            $post->save();

            return $post;
        });
    }
}