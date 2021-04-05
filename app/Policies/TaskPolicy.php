<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
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
            if($priviledge->PriviledgeID == 9){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function view(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 49){
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
            if($priviledge->PriviledgeID == 20){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function update(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 21){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function delete(User $user)
    {
        foreach($user->roles->priviledges as $priviledge){
            if($priviledge->PriviledgeID == 22){
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function restore(User $user, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function forceDelete(User $user, Task $task)
    {
        //
    }
}
