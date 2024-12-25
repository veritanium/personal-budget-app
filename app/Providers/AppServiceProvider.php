<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Create gates for user access
        Gate::define('access-admin', function (User $user) {
           return $user->hasRole('admin');
        });

        // TODO Implement gate check for selected budget
        Gate::define('access-budget', function (User $user) {
            return $user->current_budget_id !== null;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Prevent lazy loading by default
        Model::preventLazyLoading(true);
        // Disable mass assignment protection by default (for convenience)
        Model::unguard(true);
    }
}
