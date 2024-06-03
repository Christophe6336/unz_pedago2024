<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\AnneeAcademique;
use App\Models\Promotion;

class AnneeAcademiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insérer des données dans la table annee_academiques
        foreach ($this->anneesAcademiques() as $annee_academique) {
            // Récupérer la promotion correspondant à l'année académique
            $promotion = Promotion::where('annee', '=', explode('-', $annee_academique)[0])->first();

            // Si la promotion correspondante existe, créer l'année académique
            if ($promotion) {
                AnneeAcademique::create([
                    'annee_debut' => explode('-', $annee_academique)[0],
                    'annee_fin' => explode('-', $annee_academique)[1],
                    'promotion_id' => $promotion->id,
                ]);
            }
        }
    }

    // Méthode pour générer les années académiques
    private function anneesAcademiques()
    {
        return [
            '2014-2015',
            '2015-2016',
            '2016-2017',
            '2017-2018',
            '2018-2019',
            '2019-2020',
            '2020-2021',
            '2021-2022',
            '2022-2023',
            '2023-2024',
            '2024-2025',
        ];
    }
    }

