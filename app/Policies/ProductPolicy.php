<?php

namespace App\Policies;

use App\Models\User;
use App\Models\product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
            if($priviledge->PriviledgeID == 48){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 6){
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
            if($priviledge->PriviledgeID == 5){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function update(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 7){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 8){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function restore(User $user, product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product  $product
     * @return mixed
     */
    public function forceDelete(User $user, product $product)
    {
        //
    }

    public function stockOut(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 10){
                return true;
            }
        }

        return false;
    }

    public function InStock(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 11){
                return true;
            }
        }

        return false;
    }

    public function NotAvailable(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 12){
                return true;
            }
        }

        return false;
    }
}
