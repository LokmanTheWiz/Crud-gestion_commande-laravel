<?php

namespace App\Policies;

use App\Models\Fournisseur;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FournisseurPolicy
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
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magasinier'])){
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Fournisseur $fournisseur)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magasinier'])){
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
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magasinier'])){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Fournisseur $fournisseur)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magasinier'])){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Fournisseur $fournisseur)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magasinier'])){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Fournisseur $fournisseur)
    {
        //
    }
}
