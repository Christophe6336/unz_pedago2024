<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterielEnre;
use App\Models\Materiel;
use Illuminate\Support\Facades\Auth;

class MaterielEnreController extends Controller
{
    // Afficher le cahier de suivi des matériels
    public function index()
    {
        $user = Auth::user();
        $materiel_enres = MaterielEnre::all();
        return view('materiel_enre.index', compact('materiel_enres','user'));
    }
      // Afficher le formulaire de création de matériel
      public function create()
      {
          $user = Auth::user();
          $materiels = Materiel::all();
          return view('materiel_enre.create' , compact('materiels','user'));
      }


    // Enregistrer un nouvel enregistrement dans le cahier de suivi des matériels
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'action' => 'required|in:entrée,sortie',
            'materiel_id' => 'required|exists:materiels,id',
            'quantite' => 'required|integer|min:0',
            'delegue' => 'nullable|string',
            'date_retour' => 'nullable|date',
        ]);

        MaterielEnre::create($validatedData);

        return redirect()->route('materiel_enre.index')->with('success', 'Nouvel enregistrement ajouté avec succès !');
    }

    // Supprimer un enregistrement du cahier de suivi des matériels
    public function destroy(MaterielEnre $materiel_enre)
    {
        $materiel_enre->delete();
        return redirect()->route('materiel_enre.index')->with('success', 'Enregistrement supprimé avec succès !');
    }
    public function finish($id)
{
    // Code pour marquer l'enregistrement comme terminé dans votre base de données
    // Par exemple :
    $materielEnre = MaterielEnre::findOrFail($id);
    $materielEnre->statut = 'Terminé';
    $materielEnre->save();

    // Redirection vers la page d'origine ou une autre page
    return redirect()->back()->with('success', 'Enregistrement terminé avec succès.');
}

}
