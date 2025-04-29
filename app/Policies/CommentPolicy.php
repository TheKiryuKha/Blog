<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    public function edit(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;
    }

    public function destroy(User $user, Comment $comment): bool
    {
        if($user->id == $comment->user_id){
            return true;
        }

        if($user->role == UserRole::Admin){
            return true;
        }

        return false;
    }
}