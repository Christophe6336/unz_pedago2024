<?php

namespace App\Imports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\ToModel;

class PropertyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){



        return new Property([


            'jour_debut' => $row[0],
            'jour_fin' => $row[1],
            'heure_debut' => $row[2],
            'heure_fin' => $row[3],
            'enseignant' => $row[4],
            'user_id' => $row[8],
            'ufr_id' => $row[13],
            'filiere_id' => $row[14],
            'promotion_id' => $row[15],
            'semestre_id' => $row[16],
            'batiment_id' => $row[11],
            'salle_id' => $row[10],
            'statut' => $row[5],
            'module_id' => $row[9],
            //'telegram_id' => $row[15],
            'annee_academique_id' => $row[12],
        ]);
    }

    }

