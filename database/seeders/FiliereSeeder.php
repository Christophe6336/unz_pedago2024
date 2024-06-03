<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Ufr;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// Données des filières avec leur UFR
$filieres = [
    'ST' => ['MPCI', 'SVT', 'Mathematique', 'Physique', 'Chimie', 'Informatique'],
    'SEG' => ['Economie','Gestion','APE','EAE','ESG'],
    'LSH' => ['Histoire_Archeologie', 'LM', 'Psychologie','Géographie','SID','Linguistique','Philosophie'],
    'IUT' => ['GE', 'GM', 'Comptabilite']
];

// Récupérer les UFR correspondantes
$ufrs = Ufr::whereIn('nom', array_keys($filieres))->get();

// Insérer des données dans la table Filiere
foreach ($filieres as $ufrNom => $filiereNoms) {
    $ufr = $ufrs->where('nom', $ufrNom)->first();
    foreach ($filiereNoms as $filiereNom) {
        Filiere::create([
            'nom' => $filiereNom,
            'ufr_id' => $ufr->id,
        ]);
    }
}
}
}
