<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E_c_u_s extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'code',
        'nom',
        'coefficient',
    ];
}
