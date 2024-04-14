<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PropertyImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;

class ExcellController extends Controller
{
    public function importExcel(Request $request)
    {
   // dd($request->all());
         // Validez la requête et vérifiez le fichier Excel
    $request->validate([
        'fichier_excel' => 'required|mimes:xlsx,xls,csv'
    ]);

    // Récupérer le fichier Excel depuis la requête
    $file = $request->file('fichier_excel');

    if ($file) {
        // Importer les données Excel en utilisant le nom du fichier
        Excel::import(new ModeleImport, $file);

        // Rediriger avec un message de succès
        return redirect()->route('admin.property.index')->with('success', 'Importation réussie.');
    } else {
        // Gérer le cas où aucun fichier n'a été téléchargé
        return redirect()->back()->with('error', 'Aucun fichier n\'a été téléchargé.');

    }
    }

}
