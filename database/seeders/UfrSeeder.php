<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Ufr;

class UfrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Données des UFR
     $ufrs = [
        ['nom' => 'ST'],
        ['nom' => 'SEG'],
        ['nom' => 'LSH'],
        ['nom' => 'IUT'],
    ];

// Insérer des données dans la table UFR
foreach ($ufrs as $ufr) {
    Ufr::create($ufr);
}
    }
}
