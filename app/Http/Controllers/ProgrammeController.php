<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Property;
use League\Csv\Writer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use App\Imports\PropertyImport;

class ProgrammeController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'programme_file' => 'required|file|mimes:csv,txt',
        ]);

        Excel::import(new PropertyImport(), $request->file('programme_file'));

        return redirect()->back()->with('success', 'Programmes importés avec succès.');
    }

    public function exportCsv(Property $property)
    {
        $csvExporter = Writer::createFromFileObject(new \SplTempFileObject());

        // Récupérer les en-têtes de colonne en utilisant les noms des relations
        $columns = [
            'jour_debut',
            'jour_fin',
            'heure_debut',
            'heure_fin',
            'enseignant',
            'user', // Utilisateur associé à la propriété
            'ufr', // UFR associée à la propriété
            'filiere', // Filière associée à la propriété
            'promotion', // Promotion associée à la propriété
            'semestre', // Semestre associé à la propriété
            'batiment', // Bâtiment associé à la propriété
            'salle', // Salle associée à la propriété
            'statut',
            'role',
            'module',
            'telegram_id',
            'annee_academique_id',
        ];



        // Préparer les données de la propriété avec les noms des relations
        $propertyData = [
            $property->jour_debut,
            $property->jour_fin,
            $property->heure_debut,
            $property->heure_fin,
            $property->enseignant,

            $property->ufr->nom ?? '', // Nom de l'UFR associée s'il existe
            $property->filiere->nom ?? '', // Nom de la filière associée s'il existe
            $property->promotion->annee ?? '', // Nom de la promotion associée s'il existe
            $property->semestre->intitule ?? '', // Nom du semestre associé s'il existe
            $property->batiment->nom?? '', // Nom du bâtiment associé s'il existe
            $property->salle->nom ?? '', // Nom de la salle associée s'il existe
            $property->statut,
            $property->role,
            $property->module->nom ?? '', // Nom du module associé s'il existe
            $property->telegram_id,
            $property->annee_academique->annee_debut?? '',// Nom de l'année académique associée s'il existe
            $property->annee_academique->annee_fin ?? '', // Année de fin de l'année académique s'il existe
        ];


        // Ajouter les données de la propriété au fichier CSV
        $csvExporter->insertOne($propertyData);

        // Configurer la réponse HTTP avec le contenu CSV
        return Response::make($csvExporter->getContent(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Votre_Programme.csv"',
        ]);
    }

    private function replaceIdsWithNames(array $propertyData)
    {
        // Exemple de remplacement pour ufr_id
        $propertyData['ufr_id'] = Ufr::find($propertyData['ufr_id'])->nom;
        // Faites de même pour d'autres colonnes nécessitant une conversion

        return $propertyData;
    }
}
