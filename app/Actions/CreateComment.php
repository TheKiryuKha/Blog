<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\User;
use DB;

final class CreateComment{

    public function handle(User $user, array $attr): Comment
    {

        return DB::transaction(function() use($user, $attr){
            return $user->comments()->create($attr);
        });
    }
}