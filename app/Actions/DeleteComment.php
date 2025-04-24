<?php

namespace App\Actions;

use App\Models\Comment;
use DB;

final class DeleteComment{

    public function handle(Comment $comment):   bool
    {
        return DB::transaction(function() use ($comment){
            return $comment->delete();
        });
    }
}