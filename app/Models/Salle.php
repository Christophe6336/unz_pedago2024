<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'capacite',
        ];

        public function batiment()
    {
        return $this->belongsTo(Batiment::class);
    }
}
