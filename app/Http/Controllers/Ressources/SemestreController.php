<?php

namespace App\Http\Controllers\Ressources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Filiere;
use Illuminate\Support\Facades\Auth;



class SemestreController extends Controller
{
   // Afficher tous les semestres
   public function index()
   {
    $user = Auth::user();
       $semestres = Semestre::all();
       $filieres = Filiere::all();
       return view('ressources.Semestre.home', compact('semestres', 'user','filieres'));
   }

   // Afficher le formulaire de création d'un semestre
   public function create()
   {
    $user = Auth::user();
       $semestres = Semestre::all();
       return view('ressources.Semestre.creer', compact('semestres', 'user'));
   }

   // Enregistrer un nouveau semestre
   public function store(Request $request)
   {
       $request->validate([
           'intitule' => 'required|unique:semestres',
       ]);

       Semestre::create($request->all());

       return redirect()->route('semestres.index')
           ->with('success', 'Semestre créé avec succès.');
   }

   // Afficher les détails d'un semestre
   public function show(Semestre $semestre)
   {
       return view('semestres.show', compact('semestre'));
   }

   // Afficher le formulaire d'édition d'un semestre
   public function edit(Semestre $semestre)
   {
    $user = Auth::user();
       $semestres = Semestre::all();
       return view('ressources.Semestre.modifier', compact('semestre','user'));
   }

   // Mettre à jour un semestre
   public function update(Request $request, Semestre $semestre)
   {
       $request->validate([
           'intitule' => 'required|unique:semestres,intitule,'.$semestre->id,
       ]);

       $semestre->update($request->all());

       return redirect()->route('semestres.index')
           ->with('success', 'Semestre mis à jour avec succès.');
   }

   // Supprimer un semestre
   public function destroy(Semestre $semestre)
   {
       $semestre->delete();

       return redirect()->route('semestres.index')
           ->with('success', 'Semestre supprimé avec succès.');
   }
}
