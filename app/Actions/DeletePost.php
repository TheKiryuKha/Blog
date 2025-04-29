<?php

namespace App\Actions;

use App\Models\Post;
use App\Services\ImageManager;
use DB;

final class DeletePost
{
    private $service;

    public function __constract(ImageManager $service)
    {
        $this->service = $service;
    }

    public function handle(Post $post): bool
    {
        DB::transaction(function() use ($post){             
            $post->delete();
        });

        return true;
    }
}