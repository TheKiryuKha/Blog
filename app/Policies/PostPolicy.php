<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function viewAll(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function view(User $user, Post $post): bool
    {
        // сделать только для авторизованных
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->role === UserRole::Admin AND $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->role === UserRole::Admin AND $user->id === $post->user_id;
    }
}
