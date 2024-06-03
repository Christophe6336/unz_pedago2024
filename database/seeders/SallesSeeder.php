<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SallesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salles')->insert([
            'nom' => 'Salle_Informatique',
            'capacite' => 50, // capacité de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 12',
            'capacite' => 59, // capacité de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 03',
            'capacite' => 63, // capacité de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 4',
            'capacite' => 80, // capacité de la salle
            'batiment_id' => 1, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 9',
            'capacite' => 100, // capacité de la salle
            'batiment_id' => 2, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 18',
            'capacite' => 200, // capacité de la salle
            'batiment_id' => 2, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 4',
            'capacite' => 45, // capacité de la salle
            'batiment_id' => 2, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 1',
            'capacite' => 23, // capacité de la salle
            'batiment_id' => 3, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 11',
            'capacite' => 32, // capacité de la salle
            'batiment_id' => 3, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 14',
            'capacite' => 150, // capacité de la salle
            'batiment_id' => 4, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 36',
            'capacite' => 750, // capacité de la salle
            'batiment_id' => 4, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('salles')->insert([
            'nom' => 'Salle 01',
            'capacite' => 189, // capacité de la salle
            'batiment_id' => 5, // Remplacez 1 par l'ID du bâtiment
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
