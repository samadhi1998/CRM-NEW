<?php

namespace App\Providers;
use App\Models\User;
use App\Models\product;
use App\Models\Task;
use App\Models\Order;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\ProductPolicy;
use App\Policies\TaskPolicy;
use App\Policies\OrderPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::Class,
        product::class => ProductPolicy::Class,
        Task::class => TaskPolicy::Class,
        Order::class => OrderPolicy::Class,
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
       
        //User Permissions
        Gate::define('view-user', [UserPolicy::class, 'view']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
        Gate::define('edit-user', [UserPolicy::class, 'update']);
        Gate::define('assign-role', [UserPolicy::class, 'AssignTask']);

        //Product Premissions
        Gate::define('add-product', [ProductPolicy::class, 'create']);
        Gate::define('view-product', [ProductPolicy::class, 'view']);
        Gate::define('delete-product', [ProductPolicy::class, 'delete']);
        Gate::define('edit-product', [ProductPolicy::class, 'update']);
        Gate::define('Stock-out-product', [ProductPolicy::class, 'stockOut']);
        Gate::define('Stock-In-product', [ProductPolicy::class, 'InStock']);
        Gate::define('Not-Available-product', [ProductPolicy::class, 'NotAvailable']);

        //Task Premissions
        Gate::define('add-task', [TaskPolicy::class, 'create']);
        Gate::define('view-task', [TaskPolicy::class, 'viewAny']);
        Gate::define('delete-task', [TaskPolicy::class, 'delete']);
        Gate::define('edit-task', [TaskPolicy::class, 'update']);

        //Order Permission
        Gate::define('add-order', [OrderPolicy::class, 'create']);
        Gate::define('view-order', [OrderPolicy::class, 'viewAny']);
        Gate::define('view-order-deatils', [OrderPolicy::class, 'view']);
        Gate::define('delete-order', [OrderPolicy::class, 'delete']);
        Gate::define('edit-order', [OrderPolicy::class, 'update']);
        Gate::define('show-Invoice-Quotation', [OrderPolicy::class, 'show']);
        Gate::define('update-progress', [OrderPolicy::class, 'updateprogress']);

    }

    
}
