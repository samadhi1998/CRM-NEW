<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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
            if($priviledge->PriviledgeID == 13){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 14){
                return true;
            }
        }

        return false;
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
            if($priviledge->PriviledgeID == 15){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 16){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 17){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }

    public function show(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 18){
                return true;
            }
        }

        return false;
    }

    public function updateprogress(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 19){
                return true;
            }
        }

        return false;
    }
}
