<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'quantite', 'type','image'];

    public function enregistrements()
    {
        return $this->hasMany(MaterielEnre::class);
    }
}
