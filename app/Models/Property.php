<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
protected $fillable = [
'jour_debut',
    'jour_fin',
    'heure_debut',
    'heure_fin',
    'enseignant',
    'module',
    'ufr',
    'filiere',
    'promotion',
    'semestre',
    'lieu',
    'user_id',



];
// Définir la relation avec l'utilisateur
public function user()
{
    return $this->belongsTo(User::class);
}

}
