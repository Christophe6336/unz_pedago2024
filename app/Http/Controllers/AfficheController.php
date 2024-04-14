<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Property;
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
    $user = Auth::user();
    return view('private.chef.creer', compact('user'));
}


    public function update(UserUpdateRequest $request, User $user)
    {
        // Validez les données du formulaire
        $validatedData = $request->validated();

        // Mettez à jour les informations de l'utilisateur
        $user->update($validatedData);

        // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
        return redirect()->route('afficheuser')->with('success', 'Utilisateur a été modifier avec succès !');
    }
    public function edit(User $user)
    {
        return view('private.chef.modifier', compact('user'));
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'ine' => 'required',
            'telephone' => 'required',
            'password' => 'required',
            'role' => 'required',

            // Ajoutez d'autres règles de validation pour les autres attributs de l'utilisateur
        ]);

        // Créez un nouvel utilisateur avec les données validées
        User::create($validatedData);

        // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
        return redirect()->route('afficheuser')->with('success', 'Utilisateur créé avec succès !');
    }

}
