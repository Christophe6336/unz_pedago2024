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
            'jour' => $row[0],
            'heure_debut' => $row[1],
            'heure_fin' => $row[2],
            'enseignant' => $row[3],
            'module' => $row[4],
            'ufr' => $row[5],
            'filiere' => $row[6],
            'promotion' => $row[7],
            'semestre' => $row[8],
            'lieu' => $row[9],
        ]);
    }
}
