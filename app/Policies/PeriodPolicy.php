<?php

namespace App\Policies;

use App\Models\Period;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriodPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Period $period): bool
    {
        return $user->hasRole('admin') || $user->budgets->periods->contains($period);
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Period $period): bool
    {
        return $user->hasRole('admin') || $user->budgets->periods->contains($period);
    }

    public function delete(User $user, Period $period): bool
    {
        return $user->hasRole('admin') || $user->budgets->periods->contains($period);
    }

    public function restore(User $user, Period $period): bool
    {
        return false;
    }

    public function forceDelete(User $user, Period $period): bool
    {
        return false;
    }
}
