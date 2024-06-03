<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'intitule',
        ];
        public function filiere()
        {
            return $this->belongsTo(Filiere::class);
        }

        public function anneeAcademique()
        {
            return $this->belongsTo(AnneeAcademique::class);
        }
}
