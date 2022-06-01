<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isOwner', function (User $user) {
            return $user->role === 'owner';
        });

        Gate::define('isWarehous', function (User $user) {
            // return $user->role === 'warehouse';
            if ($user->role === 'warehouse') {
                return $user->role === 'warehouse';
            } elseif ($user->role === 'owner') {
                return $user->role === 'owner';
            }
        });

        Gate::define('isCashier', function (User $user) {
            return $user->role === 'marketing';
        });

        Gate::define('create-product', function (User $user) {
            return $user->role === 'warehouse';
        });
    }
}
