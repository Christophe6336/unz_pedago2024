<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
use App\Models\Module;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserUpdateRequest;


class AfficheController extends Controller
{
    public function affiche(){
    $user = Auth::user();


    // Récupérer les propriétés associées à l'utilisateur connecté
    $users = User::orderBy('created_at', 'desc')->paginate(10);

    return view('private.chef.utilisateur', compact('users') , ['user' => $user]);


}
public function destro(User $user)
{
    $user->delete();

        // Code pour supprimer une propriété spécifique de la base de données (à faire)
        return redirect()->route('afficheuser')->with('success', ' Utilisateur a été supprimer avec succes!');
    }
    public function create()
{
    $defaultRole = 'enseignant';
    $modules = Module::all();
    $user = Auth::user();
    return view('private.chef.creer', compact('user','modules','defaultRole'));
}

public function update(UserUpdateRequest $request, User $user)
{
    $userData = $request->validated();

    // Ajoutez la mise à jour du champ "module" si présent dans la requête
    if ($request->has('module_id')) {
        $userData['module_id'] = $request->input('module_id');
    }

    // Mettez à jour l'utilisateur avec les données validées, y compris le champ "module" si présent
    $user->update($userData);

    return redirect()->route('afficheuser')->with('success', 'Utilisateur modifié avec succès !');
}


    public function edit(User $user)
    {
        $modules = Module::all(); // Récupérer tous les modules disponibles

        return view('private.chef.modifier', ['user' => $user, 'modules' => $modules]);
    }

    public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'ine' => 'required',
        'telephone' => 'required',
        'password' => 'required',
    ]);

    // Condition pour déterminer le rôle de l'utilisateur en fonction des champs de formulaire
    if ($request->has('role') && $request->input('role') === 'enseignant') {
        $validatedData['role'] = 'enseignant';
    } elseif ($request->has('role_etudiant') && $request->input('role_etudiant') === 'etudiant') {
        $validatedData['role'] = 'étudiant';
    } elseif ($request->has('role_chef') && $request->input('role_chef') === 'chefdepart') {
        $validatedData['role'] = 'chefdepart';
    }

    // Créez un nouvel utilisateur avec les données validées
    $user = User::create($validatedData);

    // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
    return redirect()->route('afficheuser')->with('success', 'Utilisateur ajouté avec succès !');

}


public function createStudent()
{
    $user = Auth::user();
    $roles = ['étudiant', 'chefdepart']; // Options de rôle disponibles
    $defaultRole = 'étudiant'; // Rôle par défaut
    return view('private.chef.creer_etudiant', compact('user', 'roles', 'defaultRole'));
}

public function storeEnseignant(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'ine' => 'required',
        'telephone' => 'required',
        'telegram_id' => 'required',
        'password' => 'required',
    ]);

    // Définir le rôle comme enseignant
    $validatedData['role'] = 'enseignant';

    // Créer un nouvel utilisateur avec les données validées
    $enseignant = User::create($validatedData);

    // Vérifier si un module a été sélectionné dans le formulaire
    if ($request->has('module_id')) {
        // Récupérer l'ID du module sélectionné dans le formulaire
        $moduleId = $request->input('module_id');

        // Attacher le module à l'enseignant
        $enseignant->modules()->attach($moduleId);
    }

    // Rediriger l'utilisateur vers une page de confirmation ou une autre page appropriée
    return redirect()->route('afficheuser')->with('success', 'Un enseignant a été ajouté avec succès !');
}


public function supmod(Module $module)
{
    $module->delete();

        // Code pour supprimer un module spécifique de la base de données (à faire)
        return redirect()->route('rehome')->with('success', ' Le module a été supprimer avec succes!');
    }

    public function modumofie(Module $module)
{
    $modules = Module::with('enseignant')->get();

    $user =  Auth::user();
    $users = User::orderBy('created_at', 'desc')->paginate(10);
    return view('private.chef.modmodifie', compact( 'module', 'user','users'));
}

public function maj(Request $request, Module $module)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'code' => 'required|string|max:255',
        'coefficient' => 'required|numeric',
        'enseignant_id' => 'required|exists:users,id',
    ]);
;
    // Mettre à jour les données du module avec les données validées
    $module->update($validatedData);
//dd($request->all());
    // Ajoutez la mise à jour du champ "enseignant_id" si présent dans la requête
    if ($request->has('enseignant_id')) {
        $module->enseignant_id = $validatedData['enseignant_id'];
        $module->save();
    }

    // Rediriger avec un message de succès
    return redirect()->route('rehome')->with('success', 'Le module a été mis à jour avec succès !');
}

}
