<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Module;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            'code' => 'M001',
            'nom' => 'WEB 4',
            'coefficient' => '2',
            'enseignant_id' => 2,
            'annee_academique_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('modules')->insert([
            'code' => 'M002',
            'nom' => 'Administration_système',
            'coefficient' => '5',
            'enseignant_id' => 3,
            'annee_academique_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('modules')->insert([
            'code' => 'M003',
            'nom' => 'Programmation_système',
            'coefficient' => '4',
            'enseignant_id' => 3,
            'annee_academique_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('modules')->insert([
            'code' => 'M004',
            'nom' => 'Réseaux_Informatique',
            'coefficient' => '3',
            'enseignant_id' => 4,
            'annee_academique_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
