<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee_academique_id',
        'date',
        'etudiant_id',
        'module_id', // ID de l'étudiant
        'contenu', // ID de la fiche de séance
        'statut',
        'heure_debut',
        'heure_fin', // Statut de la fiche de séance (accepté, refusé, en attente)
    ];

    // Relation avec l'étudiant
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    // Relation avec la fiche de séance
    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }
    public function annee_academique()
    {
        return $this->belongsTo(AnneeAcademique::class,'annee_academique_id');
    }
}
