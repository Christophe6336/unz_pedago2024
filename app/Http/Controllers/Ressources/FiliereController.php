<?php

namespace App\Http\Controllers\Ressources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filiere;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $filieres = Filiere::all();
        return view('ressources.filiere.homefil', compact('filieres','user'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        $user = Auth::user();
        return view('ressources.filiere.creer',compact('filieres','user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nom' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        Filiere::create($validatedData);

        return redirect()->route('filieres.index')->with('success', 'La filière a été créée avec succès !');
    }


    public function edit(Filiere $filiere)
    {
        $user = Auth::user();
        $filieres = Filiere::all();
        return view('ressources.filiere.modifier', compact('filiere','user'));
    }

    public function update(Request $request, Filiere $filiere)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nom' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $filiere->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'La filière a été mise à jour avec succès !');
    }

    public function destroy(Filiere $filiere)
    {
        $user = Auth::user();
        $filiere->delete();
        return redirect()->route('filieres.index')->with('success', 'La filière a été supprimée avec succès !');
    }
}
