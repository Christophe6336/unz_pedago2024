<?php

namespace App\Http\Controllers\Ressources;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Batiment;
class SalleController extends Controller
{
    // Afficher la liste des salles
    public function index()
    {
        $user = Auth::user();
        $salles = Salle::all();
        return view('ressources.salle.home', compact('salles','user'));
    }

    // Afficher le formulaire de création de salle
    public function create()
    {
        $batiments = Batiment::all();
        $user = Auth::user();
        return view('ressources.salle.creer', compact('user', 'batiments'));
    }


    // Enregistrer une nouvelle salle
    public function store(Request $request)
{
    $user = Auth::user();

    // Validation des données
    $validatedData = $request->validate([
        'nom' => 'required',
        'capacite' => 'required|integer|min:1',
        'batiment_id' => 'required|exists:batiments,id',
    ]);

    // Créer une nouvelle salle avec les données validées
    $salle = new Salle();
    $salle->nom = $validatedData['nom'];
    $salle->capacite = $validatedData['capacite'];
    $salle->batiment_id = $validatedData['batiment_id'];
    $salle->save();

    // Rediriger avec un message de succès
    return redirect()->route('salle.index')->with('success', 'La salle a été créée avec succès !');
}


    // Afficher le formulaire d'édition de salle
    public function edit(Salle $salle)
    {
        $user = Auth::user();
        return view('ressources.salle.modifier', compact('salle','user'));
    }

    // Mettre à jour une salle existante
    public function update(Request $request, Salle $salle)
    {
        $user = Auth::user();
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required',
            'capacite' => 'required|integer|min:1',
        ]);

        // Mettre à jour les données de la salle avec les données validées
        $salle->update($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('salle.index')->with('success', 'La salle a été mise à jour avec succès !');
    }

    // Supprimer une salle
    public function destroy(Salle $salle)
    {
        $user = Auth::user();
        // Supprimer la salle de la base de données
        $salle->delete();

        // Rediriger avec un message de succès
        return redirect()->route('salle.index')->with('success', 'La salle a été supprimée avec succès !');
    }
    public function getSallesByBatiment($batimentId)
    {
        $batiment = Batiment::findOrFail($batimentId);
        $salles = $batiment->salles()->get(['id', 'nom']); // Supposons que la relation entre Batiment et Salle soit définie dans le modèle Batiment

        return response()->json($salles);
    }
}
