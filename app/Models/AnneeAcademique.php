<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    use HasFactory;
    protected $fillable = ['annee_debut', 'annee_fin','promotion_id'

    ];
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
