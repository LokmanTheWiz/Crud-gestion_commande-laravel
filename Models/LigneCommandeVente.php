<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommandeVente extends Model
{
    use HasFactory;
    protected $fillable = ['commande_vente_id',  'produit_id', 'qt'];
    
    public function produit(){
        return this->hasMany(Produit::class);
    }

}
