<?php

namespace App\Actions;

use App\Models\Post;
use App\Models\User;
use DB;

final class ToggleLikePost{

    public function handle(User $user, Post $post, bool $is_liked): bool
    {
        DB::transaction(function() use ($user, $post, $is_liked){

            if($is_liked){

                $post->likes--;
                $post->saveDislikeInHistory($user);

            } else{
                $post->likes++;
                $post->saveLikeInHistory($user);
            }
            $post->save();

        });
        return true;       
    }
}