<?php

namespace App\Actions;

use App\DTO\PostDTO;
use App\Models\Post;
use DB;

final class EditPost{

    public function handle(Post $post, array $attr): bool
    {
        DB::transaction(function() use ($post, $attr){
            $post->update($attr);
        });
        
        return true;
    }
}