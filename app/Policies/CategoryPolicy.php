<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{

    public function index(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }
    public function show(User $user, Category $category): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function update(User $user, Category $category): bool
    {
        return $user->role === UserRole::Admin;
    }
    
    public function delete(User $user, Category $category): bool
    {
        return $user->role === UserRole::Admin;
    }
}
