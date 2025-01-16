<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any application services.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate to ensure only admins can perform admin actions
        Gate::define('admin-actions', function (User $user) {
            return $user->role === 'admin';
        });

        // Gate to ensure only staff can perform staff actions
        Gate::define('staff-actions', function (User $user) {
            return $user->role === 'staff';
        });

        // Gate to ensure only leaders can perform leader actions
        Gate::define('leader-actions', function (User $user) {
            return $user->role === 'academician' && $user->is_leader;
        });

        // Gate to ensure only members can perform member actions
        Gate::define('member-actions', function (User $user) {
            return $user->role === 'academician' && !$user->is_leader;
        });
    }
}