<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['code','nom','coefficient','enseignant_id','annee_academique_id',]; // Ajoutez les colonnes de votre table Module si nécessaire

    public function enseignants()
    {
        return $this->belongsToMany(User::class);}
    public function enseignant()
    {
        // On suppose qu'il existe une relation "enseignant" dans la table des modules qui pointe vers la table des utilisateurs
        return $this->belongsTo(User::class, 'enseignant_id');
    }
    public function cahiers()
    {
        return $this->hasMany(Cahier::class);
    }
    public function annee_academique()
    {
        return $this->belongsTo(AnneeAcademique::class, 'annee_academique_id');
    }
}

