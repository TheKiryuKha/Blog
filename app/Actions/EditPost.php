<?php

namespace App\Actions;

use App\Models\Post;
use App\Traits\HandlesCategories;
use DB;

final class EditPost{

    use HandlesCategories;
    public function handle(Post $post, array $attr): bool
    {
        DB::transaction(function() use ($post, $attr){

            $categories = $this->extractCategories($attr);
            $post->update($attr);
            $post->categories()->sync($categories);
        });
        
        return true;
    }
}