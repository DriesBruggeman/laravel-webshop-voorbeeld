<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('mod-product', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-reviews', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('leave-review', function ($user){
           return $user->hasRole('customer');
        });

        Gate::define('delete-own-reviews', function ($user){
            return $user->hasRole('customer');
        });

    }
}
