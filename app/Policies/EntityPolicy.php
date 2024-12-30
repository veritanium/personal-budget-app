<?php

namespace App\Policies;

use App\Models\Entity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Entity $entity): bool
    {
        return $user->hasRole('admin') || $user->budgets->entities->contains($entity);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Entity $entity): bool
    {
        return $user->hasRole('admin') || $user->budgets->entities->contains($entity);
    }

    public function delete(User $user, Entity $entity): bool
    {
        return $user->hasRole('admin') || $user->budgets->entities->contains($entity);
    }

    public function restore(User $user, Entity $entity): bool
    {
        return false;
    }

    public function forceDelete(User $user, Entity $entity): bool
    {
        return false;
    }
}
