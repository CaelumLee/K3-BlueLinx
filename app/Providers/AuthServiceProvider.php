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

        Gate::define('admin', function ($user) {
            return (!is_null($user->roles->find(1)) 
                    && $user->roles->find(1)->id == 1) ? true : false;
        });

        Gate::define('employee', function ($user) {
            return (!is_null($user->roles->find(2)) 
                    && $user->roles->find(2)->id == 2) ? true : false;
        });
    }
}
