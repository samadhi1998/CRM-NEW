<?php

namespace App\Policies;

use App\Models\User;
use App\Models\extra_charge;
use Illuminate\Auth\Access\HandlesAuthorization;

class extra_chargePolicy
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
            if($priviledge->PriviledgeID == 24){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\extra_charge  $extraCharge
     * @return mixed
     */
    public function view(User $user, extra_charge $extraCharge)
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
            if($priviledge->PriviledgeID == 23){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\extra_charge  $extraCharge
     * @return mixed
     */
    public function update(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 25){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\extra_charge  $extraCharge
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 26){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\extra_charge  $extraCharge
     * @return mixed
     */
    public function restore(User $user, extra_charge $extraCharge)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\extra_charge  $extraCharge
     * @return mixed
     */
    public function forceDelete(User $user, extra_charge $extraCharge)
    {
        //
    }
}
