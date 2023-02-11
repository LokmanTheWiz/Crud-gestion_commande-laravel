<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeAchat extends Model
{
    use HasFactory;
    protected $fillable = ['dateCom', 'fournisseur_id'];

    public function produit(){
        return $this->Belongesto(Produit::class);
    }

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class);
    }
    public function produitAchats()
    {
        return $this->belongsToMany(Produit::class, 'ligne_commande_achats')->withPivot('qt');
    }
}
