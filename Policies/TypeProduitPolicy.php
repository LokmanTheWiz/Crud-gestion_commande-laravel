<?php

namespace App\Policies;

use App\Models\User;
use App\Models\typeProduit;
use Illuminate\Auth\Access\HandlesAuthorization;

class typeProduitPolicy
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
        if(in_array($user->type, ['Gerant', 'Magasinier'])){
            return true;
        }
        else if(in_array($user->type, ['Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\typeProduit  $typeProduit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, typeProduit $typeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magasinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
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
        if(in_array($user->type, ['Gerant', 'Magasinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\typeProduit  $typeProduit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, typeProduit $typeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magasinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\typeProduit  $typeProduit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, typeProduit $typeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magasinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\typeProduit  $typeProduit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, typeProduit $typeProduit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\typeProduit  $typeProduit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, typeProduit $typeProduit)
    {
        //
    }
}
