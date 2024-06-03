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
    'ufr_id',
    'filiere_id',
    'promotion_id',
    'semestre_id',
    'batiment_id',
    'salle_id',
    'statut',
    'role',
    'user_id',
    'module_id',
    'telegram_id',
    'annee_academique_id',




];
// Définir la relation avec l'utilisateur
public function user()
{
    return $this->belongsTo(User::class);
}
public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'batiment_id'); // Assurez-vous que le nom de la classe est correct
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id'); // Assurez-vous que le nom de la classe est correct
    }

    public function annee_academique()
    {
        return $this->belongsTo(AnneeAcademique::class , 'annee_academique_id');
    }

   public function ufr()
    {
        return $this->belongsTo(Ufr::class, 'ufr_id');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'semestre_id');
    }

}
