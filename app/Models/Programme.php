<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel; // Ajout de l'import pour la classe Excel
use App\Models\Ufr;
use App\Models\Filiere;
use App\Models\Promotion;
use App\Models\Semestre;
use App\Models\Property;
class Programme extends Model
{
    use HasFactory;
    public static function import(array $rows)
    {
        foreach ($rows as $row) {
            $ufrId = Ufr::where('nom', $row['ufr'])->value('id');
            if (!$ufrId) {
                // Gérez l'erreur ou attribuez une valeur par défaut
                $ufrId = 1; // Valeur par défaut
            }
            // Vous devez transformer les données de la ligne en un modèle Property
            $property = new Property([
                'jour_debut' => $row[0],
                'jour_fin' => $row[1],
                'heure_debut' => $row[2],
                'heure_fin' => $row[3],
                'enseignant' => $row[4],
                'statut' => $row[5],

                'user_id' => $row[8], // Utilisateur associé à la propriété
                'ufr_id' => $row[13], // UFR associée à la propriété
                'filiere_id' => $row[14], // Filière associée à la propriété
                'promotion_id' => $row[15], // Promotion associée à la propriété
                'semestre_id' => $row[9], // Semestre associé à la propriété
                'batiment_id' => $row[11], // Bâtiment associé à la propriété
                'salle_id' => $row[10], // Salle associée à la propriété
                'semestre_id' => $row[16],
                'module_id' => $row[9],
                //'telegram_id' => $row[16],
                'annee_academique_id' => $row[12],
                // Assurez-vous d'ajouter les autres colonnes nécessaires
            ]);

            // Enregistrez le modèle Property dans la base de données
            $property->save();
        }
    }



}
