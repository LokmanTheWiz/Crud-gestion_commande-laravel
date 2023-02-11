<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if(in_array($user->type, ['Gerant'])){
            return true;
        }
        else {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\users  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, utilisateur $utilisateur)
    {
        if (in_array($user->type, ['Magasinier'])){
            return true;
        }
        else{
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if(in_array($user->type, ['Gerant'])){
            return true;
        }
        else if (in_array($user->type, ['Magasinier', 'Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\users  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, users $users)
    {
        if(in_array($user->type, ['Gerant'])){
            return true;
        }
        else if (in_array($user->type, ['Magasinier', 'Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\users  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, users $users)
    {
        if(in_array($user->type, ['Gerant'])){
            return true;
        }
        else{
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\users  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, users $users)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\users  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, users $users)
    {
        //
    }
}
