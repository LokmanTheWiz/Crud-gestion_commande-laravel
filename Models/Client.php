<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'email', 'adresse','telephone','ville'];

    public function commandeventes()
    {
        return $this->hasMany(CommandeVente::class);
    }
}
