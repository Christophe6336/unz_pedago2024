<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'annee',
        ];

        public function anneesAcademiques()
        {
            return $this->hasMany(AnneeAcademique::class);
        }
}
