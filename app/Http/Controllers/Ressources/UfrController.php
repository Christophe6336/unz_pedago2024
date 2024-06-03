<?php

namespace App\Http\Controllers\Ressources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ufr;
use Illuminate\Support\Facades\Auth;

class UfrController extends Controller
{
      // Afficher toutes les ufr
      public function index()
      {
        $user = Auth::user();
          $ufrs = Ufr::all();
          return view('ressources.U_F_R.home', compact('ufrs','user'));
      }

      // Afficher le formulaire de création d'une ufr
      public function create()
      {
        $user = Auth::user();
        $ufrs = Ufr::all();
          return view('ressources.U_F_R.creer',compact('ufrs','user'));
      }

      // Enregistrer une nouvelle ufr
      public function store(Request $request)
      {
          $request->validate([
              'nom' => 'required|string|unique:ufrs',
          ]);

          Ufr::create($request->all());

          return redirect()->route('ufrs.index')
              ->with('success', 'UFR créée avec succès.');
      }

      // Afficher les détails d'une ufr
      public function show(Ufr $ufr)
      {
          return view('ufrs.show', compact('ufr'));
      }

      // Afficher le formulaire d'édition d'une ufr
      public function edit(Ufr $ufr)
      {
        $user = Auth::user();
          return view('ressources.U_F_R.modifier', compact('ufr','user'));
      }

      // Mettre à jour une ufr
      public function update(Request $request, Ufr $ufr)
      {
          $request->validate([
              'nom' => 'required|string|unique:ufrs,nom,'.$ufr->id,
          ]);

          $ufr->update($request->all());

          return redirect()->route('ufrs.index')
              ->with('success', 'UFR mise à jour avec succès.');
      }

      // Supprimer une ufr
      public function destroy(Ufr $ufr)
      {
          $ufr->delete();

          return redirect()->route('ufrs.index')
              ->with('success', 'UFR supprimée avec succès.');
      }
}
