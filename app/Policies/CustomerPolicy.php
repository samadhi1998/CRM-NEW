<?php

namespace App\Policies;

use App\Models\User;
use App\Models\customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 40){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\customer  $customer
     * @return mixed
     */
    public function view(User $user, customer $customer)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 39){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\customer  $customer
     * @return mixed
     */
    public function update(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 41){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\customer  $customer
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 42){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\customer  $customer
     * @return mixed
     */
    public function restore(User $user, customer $customer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\customer  $customer
     * @return mixed
     */
    public function forceDelete(User $user, customer $customer)
    {
        //
    }
}
