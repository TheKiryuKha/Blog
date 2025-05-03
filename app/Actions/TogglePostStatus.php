<?php

namespace App\Actions;

use App\Enums\PostStatus;
use App\Models\Post;
use DB;

final class TogglePostStatus{

    public function handle(Post $post): bool
    {
        DB::transaction(function() use($post){
            if($post->status == PostStatus::Simple){
                $post->status = PostStatus::Featured;
            } else{
                $post->status = PostStatus::Simple;
            }
            $post->save();
        });
        return true;
    }
}