<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CommandeVente extends Model
{
    use HasFactory;
    protected $fillable = ['dateCom', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits(){
        return $this->belongsToMany(Produit::class, 'ligne_commande_ventes')->withPivot('qt');
    
    }
    // ,'ligne_commande_ventes')->withPivot('qt');
}
