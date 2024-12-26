<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Category $category): bool
    {
        return $user->hasRole('admin') || $user->current_budget_id === $category->budget_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function edit(User $user, Category $category): bool
    {
        return $user->hasRole('admin') || $user->current_budget_id === $category->budget_id;
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasRole('admin') || $user->current_budget_id === $category->budget_id;
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasRole('admin') || $user->current_budget_id === $category->budget_id;
    }
}
