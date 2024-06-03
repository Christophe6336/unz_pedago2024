<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PropertyFormRequest;
use Illuminate\Http\Request;
use App\Models\Cahier;
use App\Models\Module;
class CahierController extends Controller
{
    public function edit($id)
{
    $modules = Module::all();
    $cahier = Cahier::findOrFail($id);
    $user = Auth::user();
    // Retourne une vue d'édition avec les détails du cahier
    return view('dashboard.cahieredit', compact('cahier', 'modules','user'));
}

public function update(Request $request, Cahier $cahier)
{
    //dd($request->all());
    // Valider les données de la requête
    $validatedData = $request->validate([
        'date' => 'required',
        'heure_debut' => 'required',
        'heure_fin' => 'required',
        'contenu' => 'required',
        // Ajoutez les autres règles de validation au besoin
    ]);

    // Mettre à jour les données du cahier
    $cahier->update($validatedData);

    // Rediriger avec un message de succès
    return redirect()->route('cahier', $cahier->id)->with('success', 'La fiche de seance a été mis à jour avec succès !');
}


public function destroy($id)
{
    $cahier = Cahier::findOrFail($id);
    // Supprimez le cahier de la base de données...
    $cahier->delete();

    return redirect()->route('cahier')->with('success', 'La fiche de seance a été  supprimé avec succès !');
}

public function index()
{

    // Récupérer l'utilisateur actuellement authentifié
    $user = Auth::user();
    // Vérifier si l'utilisateur est un enseignant
    if ($user->role === 'enseignant') {
        // Récupérer les cahiers associés au module de l'enseignant
        $cahiers = $user->modules->flatMap(function ($module) {
            return $module->cahiers;
        });

    } else {
        // Si l'utilisateur n'est pas un enseignant, récupérer tous les cahiers
        $cahiers = Cahier::all();
    }

    // Récupérer tous les modules
    $modules = Module::all();

    // Retourner une vue d'édition avec les détails du cahier
    return view('dashboard.cahierenseignan', compact('cahiers', 'modules', 'user'));
}

public function validerCahier(Cahier $cahier)
{
    $cahier->update(['statut' => 'accepte']);
    return redirect()->back()->with('success', 'La fiche de seance a été validé avec succès !');
}

public function rejeterCahier(Cahier $cahier)
{
    $cahier->delete();
    return redirect()->back()->with('success', 'La fiche de seance a été supprimé avec succès !');
}

public function editer($id)
{
    $user = Auth::user();
    $modules = Module::all();
    $cahier = Cahier::findOrFail($id);
    $cahier = Cahier::findOrFail($id);
    // Vous pouvez également ajouter une logique supplémentaire ici si nécessaire
    return view('dashboard.editecahier', compact('cahier','modules', 'user'));
}

public function updat(Request $request, $id)
{
    $cahier = Cahier::findOrFail($id);
    // Mettez à jour les champs du cahier avec les données du formulaire
    $cahier->update([
        'date' => $request->input('date'),
        // Ajoutez d'autres champs à mettre à jour ici
    ]);

    // Redirigez l'utilisateur vers une page appropriée après la mise à jour du cahier
    return redirect()->route('cahierenseignant')->with('success', 'Cahier mis à jour avec succès !');
}

}


