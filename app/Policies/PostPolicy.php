<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function index(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function show(User $user, Post $post): bool
    {
        return true;
    }
    
    public function create(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id AND $user->role === UserRole::Admin;
    }
    
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id AND $user->role === UserRole::Admin;
    }
}