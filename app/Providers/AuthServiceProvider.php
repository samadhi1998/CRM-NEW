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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerUserPolicies();

        //
    }

    public function registerUserPolicies()
    {
        Gate::define('Edit-User',function($user){
            $user->hasAccess('Edit-User');
        });

        Gate::define('Delete-User',function($user){
            $user->hasAccess('Delete-User');
        });

        Gate::define('View-User',function($user){
            $user->hasAccess('View-User');
        });
    }
}
