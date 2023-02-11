<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeproduit extends Model
{
    use HasFactory;
    protected $fillable = ['libelle'];

    public function produits(){
        return $this->hasMany(Produit::class);
    }
}
