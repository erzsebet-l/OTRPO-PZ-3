<?php

namespace App\Providers;

use App\Models\House;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-house', function (User $user, House $house) {
            return $user->id === $house->user_id || $user->is_admin;
        });

        Gate::define('update-house', function (User $user, House $house) {
            return $user->id === $house->user_id || $user->is_admin;
        });

        Gate::define('delete-house', function (User $user, House $house) {
            return $user->id === $house->user_id || $user->is_admin;
        });

        Gate::define('restore-house', function (User $user) {
            return $user->is_admin;
        });
    }
}
