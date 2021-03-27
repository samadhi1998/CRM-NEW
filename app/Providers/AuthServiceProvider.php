<?php

namespace App\Providers;
use App\Models\User;
use App\Models\product;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::Class,
        // 'App\product' => 'App\Policies\ProductPolicy',
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       
        // Gate::resource('users', UserPolicy::Class);
        // Gate::resource('products','App\Policies\ProductPolicy');
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
        
        //
    }

    
}
