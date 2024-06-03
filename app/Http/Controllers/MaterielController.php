<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel;
use Illuminate\Support\Facades\Auth;
class MaterielController extends Controller
{
    // Afficher tous les matériels
    public function index()
    {
        $user = Auth::user();
        $materiel =Materiel::all();
        return view('materiel.index', compact('materiel','user'));
    }

    // Afficher le formulaire de création de matériel
    public function create()
    {
        $user = Auth::user();
        $materiel = new Materiel;
        return view('materiel.create' , compact('materiel','user'));
    }

    // Enregistrer un nouveau matériel
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'type' => 'required|in:consommable,non_consommable',
            'quantite' => 'required|integer|min:0',
        ]);
        // Traitez l'image si elle est téléchargée
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images'); // Stockez l'image dans le dossier "images"
        $validatedData['image'] = $imagePath; // Enregistrez le chemin d'accès de l'image dans la base de données
    }

        // Création d'un nouveau matériel
        Materiel::create($validatedData);

        return redirect()->route('materials.index')->with('success', 'Matériel ajouté avec succès !');
    }

    // Afficher les détails d'un matériel
    public function show($id)
    {
        $materiels = Materiel::findOrFail($id);
        return view('materials.show', compact('materiels'));
    }

    // Afficher le formulaire de modification d'un matériel
    public function edit($id)
    {
        $user = Auth::user();
        $materiel = Materiel::findOrFail($id);
        return view('materiel.edit', compact('materiel','user'));
    }

    // Mettre à jour un matériel
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'type' => 'required|in:consommable,non_consommable',
            'quantite' => 'required|integer|min:0',
        ]);

        // Recherche et mise à jour du matériel
        $materiels = Materiel::findOrFail($id);
        $materiels->update($validatedData);

        return redirect()->route('materials.index')->with('success', 'Matériel mis à jour avec succès !');
    }

    // Supprimer un matériel
    public function destroy($id)
    {
        Materiel::findOrFail($id)->delete();
        return redirect()->route('materials.index')->with('success', 'Matériel supprimé avec succès !');
    }
}
