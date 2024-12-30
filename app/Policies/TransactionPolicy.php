<?php

namespace App\Policies;

use App\Models\transaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, transaction $transaction): bool
    {
        return $user->hasRole('admin') || $user->budgets()->transactions()->contains($transaction);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, transaction $transaction): bool
    {
        return $user->hasRole('admin') || $user->budgets()->transactions()->contains($transaction);
    }

    public function delete(User $user, transaction $transaction): bool
    {
        return $user->hasRole('admin') || $user->budgets()->transactions()->contains($transaction);
    }

    public function restore(User $user, transaction $transaction): bool
    {
        return false;
    }

    public function forceDelete(User $user, transaction $transaction): bool
    {
        return false;
    }
}
