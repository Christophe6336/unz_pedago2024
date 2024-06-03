<?php

namespace App\Http\Controllers\Ressources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Module;
use App\Models\Batiment;


class BatimentController extends Controller
{
    public function home()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer tous les bâtiments
        $batiments = Batiment::all();

        // Passer les données à la vue
        return view('ressources.Batiment.home', compact('batiments', 'user'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $user = Auth::user();
        return view('ressources.batiment.creer',compact('user'));
    }

    // Enregistrer un nouveau bâtiment
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation pour les autres champs si nécessaire
        ]);

        // Créer un nouveau bâtiment avec les données validées
        Batiment::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('homebat')->with('success', 'Le bâtiment a été créé avec succès !');
    }

    // Afficher le formulaire de modification
    public function edit(Batiment $batiment)
    {
        $user = Auth::user();
        return view('ressources\Batiment.modifier', compact('batiment','user'));
    }

    // Mettre à jour les informations du bâtiment
    public function update(Request $request, Batiment $batiment)
    {
        $user = Auth::user();
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            // Ajoutez ici d'autres règles de validation pour les autres champs si nécessaire
        ]);

        // Mettre à jour les informations du bâtiment avec les données validées
        $batiment->update($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('homebat')->with('success', 'Le bâtiment a été mis à jour avec succès !');
    }

    // Supprimer un bâtiment
public function destroy(Batiment $batiment)
{
    // Supprimer le bâtiment de la base de données
    $batiment->delete();

    // Rediriger avec un message de succès
    return redirect()->route('homebat')->with('success', 'Le bâtiment a été supprimé avec succès !');
}


}
