<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use DB;

final class CreateComment{

    public function handle(User $user, Post $post, array $attr): Comment
    {

        return DB::transaction(function() use($user, $post, $attr){
            $comment = new Comment();

            $comment->fill($attr);
            $comment->user_id = $user->id;
            $comment->post_id = $post->id;
            $comment->save();

            return $comment;
        });
    }
}