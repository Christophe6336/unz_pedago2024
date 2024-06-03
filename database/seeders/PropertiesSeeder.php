<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            'jour_debut' => now(),
            'jour_fin' => now(),
            'heure_debut' => '08:00:00',
            'heure_fin' => '10:00:00',
            'enseignant' => 'KABORE',
            'ufr_id' => 1,
            'filiere_id' => 1,
            'promotion_id' => 6,
            'semestre_id' => 1,
            'statut' => 'Non valide',
            'created_at' => now(),
            'updated_at' => now(),
            'salle_id' => 2, // Remplacez 1 par l'ID de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'module_id' => 1, // Remplacez 1 par l'ID du module
            'user_id' => 2,
            
            'annee_academique_id' => 4, // Remplacez 1 par l'ID de l'utilisateur
        ]);
        DB::table('properties')->insert([
            'jour_debut' => now(),
            'jour_fin' => now(),
            'heure_debut' => '10:00:00',
            'heure_fin' => '15:00:00',
            'enseignant' => 'BAKOUAN',
            'ufr_id' => 1,
            'filiere_id' => 1,
            'promotion_id' => 3,
            'semestre_id' => 5,
            'statut' => 'Non valide',
            'created_at' => now(),
            'updated_at' => now(),
            'salle_id' => 3, // Remplacez 1 par l'ID de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'module_id' => 2, // Remplacez 1 par l'ID du module
            'user_id' => 4,
            'annee_academique_id' => 4,
        ]);
    }
}
