<?php

namespace App\Actions;

use App\Models\Comment;
use DB;

final class EditComment{

    public function handle(Comment $comment, array $attr):  bool 
    {
        return DB::transaction(function() use ($comment, $attr){
            return $comment->update($attr);
        });
    }
}