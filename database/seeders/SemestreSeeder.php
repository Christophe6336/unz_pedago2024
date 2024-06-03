<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Ufr;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Données des semestres avec leurs filières
        $semestres = [
            'MPCI' => ['S1', 'S2', 'S3'],
            'SVT' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Mathematique' => ['S4', 'S5', 'S6'],
            'Physique' => ['S4', 'S5', 'S6'],
            'Chimie' => ['S4', 'S5', 'S6'],
            'Informatique' => ['S4', 'S5', 'S6'],
            'Economie' => ['S1', 'S2', 'S3', 'S4', 'S5'],
            'Gestion' => ['S1', 'S2', 'S3', 'S4', 'S5'],
            'APE' => ['S6'],
            'EAE' => ['S6'],
            'ESG' => ['S6'],
            'Histoire_Archeologie' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'LM' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Psychologie' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Géographie' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'SID' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Linguistique' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Philosophie' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'GE' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'GM' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
            'Comptabilite' => ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        ];

        // Récupérer les filières correspondantes
        $filieres = Filiere::whereIn('nom', array_keys($semestres))->get();

        // Insérer des données dans la table Semestre
        foreach ($semestres as $filiereNom => $semestreNoms) {
            $filiere = $filieres->where('nom', $filiereNom)->first();
            foreach ($semestreNoms as $semestreNom) {
                Semestre::create([
                    'intitule' => $semestreNom,
                    'filiere_id' => $filiere->id,
                ]);
            }
        }
    }
}
