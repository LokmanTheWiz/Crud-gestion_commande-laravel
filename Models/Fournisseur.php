<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['nom',  'email', 'adresse','telephone','ville']; 

    public function comandeAchats(){
        return $this->hasMany(CommandeAchat::class);
    }
}
