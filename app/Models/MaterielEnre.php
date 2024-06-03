<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterielEnre extends Model
{
    use HasFactory;

    protected $fillable = ['materiel_id', 'action', 'quantite', 'delegue', 'date_retour', 'statut'];

    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }

    public function estEnCours()
    {
        return $this->date_retour === null;
    }

    public function estTermine()
    {
        return $this->date_retour !== null;
    }
}
