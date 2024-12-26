<?php

namespace App\Policies;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BudgetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Budget $budget): bool
    {
        return $user->hasRole('admin') || $user->budgets->contains($budget);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    public function edit(User $user, Budget $budget): bool
    {
        return $user->hasRole('admin') || $user->budgets->contains($budget);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Budget $budget): bool
    {
        return $user->hasRole('admin') || $user->budgets->contains($budget);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Budget $budget): bool
    {
        return $user->hasRole('admin') || $user->budgets->contains($budget);
    }
}
