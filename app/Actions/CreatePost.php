<?php

namespace App\Actions;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
use App\Traits\HandlesCategories;
use DB;

final class CreatePost{

    use HandlesCategories;
    public function handle(User $user, array $attr): Post
    {
        return DB::transaction(function() use($user, $attr){

            $categories = $this->extractCategories($attr);

            $post = new Post($attr);
            $post->user_id = $user->id;
            $post->views = 0;
            $post->likes = 0;
            $post->status = PostStatus::Simple;
            $post->save();

            $post->categories()->sync($categories);

            return $post;
        });
    }
}