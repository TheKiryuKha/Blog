<?php

namespace App\Actions;

use App\Models\Post;
use App\Services\ImageManager;
use DB;

final class DeletePost
{
    
    public function handle(Post $post): bool
    {
        DB::transaction(function() use ($post){             
            $post->delete();
        });

        return true;
    }
}