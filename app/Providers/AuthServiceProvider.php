<?php

namespace App\Providers;
use App\Models\User;
use App\Models\product;
use App\Models\Task;
use App\Models\Note;
use App\Models\Order;
use App\Models\Role;
use App\Models\Event;
use App\Models\customer;
use App\Models\extra_charge;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\ProductPolicy;
use App\Policies\TaskPolicy;
use App\Policies\OrderPolicy;
use App\Policies\extra_chargePolicy;
use App\Policies\RolePolicy;
use App\Policies\NotePolicy;
use App\Policies\CustomerPolicy;
use App\Policies\ReminderPolicy;

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
        extra_charge::class => extra_chargePolicy::Class,
        Role::class => RolePolicy::Class,
        customer::class => CustomerPolicy::Class,
        Note::class => NotePolicy::Class,
        Event::class => ReminderPolicy::Class,
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

        //Extra Charge Premissions
        Gate::define('add-charge', [extra_chargePolicy::class, 'create']);
        Gate::define('view-charge', [extra_chargePolicy::class, 'viewAny']);
        Gate::define('delete-charge', [extra_chargePolicy::class, 'delete']);
        Gate::define('edit-charge', [extra_chargePolicy::class, 'update']);

        //Roles and Permission Premissions
        Gate::define('add-role', [RolePolicy::class, 'create']);
        Gate::define('view-role', [RolePolicy::class, 'viewAny']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);
        Gate::define('edit-role', [RolePolicy::class, 'update']);

        //Customer Premissions
        Gate::define('add-customer', [CustomerPolicy::class, 'create']);
        Gate::define('view-customer', [CustomerPolicy::class, 'viewAny']);
        Gate::define('delete-customer', [CustomerPolicy::class, 'delete']);
        Gate::define('edit-customer', [CustomerPolicy::class, 'update']);

        //Note Premissions
        Gate::define('add-note', [NotePolicy::class, 'create']);
        Gate::define('view-note', [NotePolicy::class, 'viewAny']);
        Gate::define('delete-note', [NotePolicy::class, 'delete']);
        Gate::define('edit-note', [NotePolicy::class, 'update']);

        //Reminder Premissions
        Gate::define('add-reminder', [ReminderPolicy::class, 'create']);
        Gate::define('view-reminder', [ReminderPolicy::class, 'viewAny']);
        Gate::define('view-calendar', [ReminderPolicy::class, 'view']);
        Gate::define('delete-reminder', [ReminderPolicy::class, 'delete']);
        Gate::define('edit-reminder', [ReminderPolicy::class, 'update']);


    }

    
}
