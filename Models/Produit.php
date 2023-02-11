<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['libelle','typeproduit_id', 'prix','image','description','qtStock'];
    public function typeproduit(){
        return $this->belongsTo(TypeProduit::class);
    }

    public function commandeventes(){
        return $this->belongsToMany(CommandeVente::class);
    }


    public function commandeAchats()
    {
        return $this->belongsToMany(CommandeAchat::class);
    }
    public function lignecomanddvente()
    {
        return $this->belongsToMany(LigneCommandeVente::class);
    }
}
