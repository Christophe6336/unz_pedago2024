<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufr extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        ];
        public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}
