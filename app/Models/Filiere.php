<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        ];
        
    public function ufr()
    {
        return $this->belongsTo(UFR::class);
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class);
    }
}
