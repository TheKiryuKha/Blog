<?php

namespace App\Actions;

use App\Models\Post;
use App\Models\User;
use DB;

final class ViewPost{
    
    public function handle(User $user, Post $post): bool
    {
        DB::transaction(function() use($user, $post){    
            $post->views++;
            $post->save();

            DB::table('history')->insert([
                'post_id' => $post->id,
                'user_id' => $user->id
            ]);
        });
        return true;
    }
}