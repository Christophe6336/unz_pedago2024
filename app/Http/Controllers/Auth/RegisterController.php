<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Importez la classe Validator

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.inscription');
    }

    public function register(Request $request)
{
    $validator = Validator::make(
        $request->all(),
        [
            'nom' => 'required',
            'prenom' => 'required',
            'ine' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:4|confirmed',
        ],
        [
            'nom.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ  prénom est requis.',
            'ine.required' => 'Le champ ine est requis.',
            'telephone.required' => 'Le champ telephone est requis.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]
    );

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Création d'une nouvelle instance du modèle User
    $user = new User();

    // Connectez automatiquement l'utilisateur après son inscription
   // Auth::login($user);


    // Attribution des valeurs des champs du formulaire aux propriétés du modèle
    $user->nom = $request->nom;
    $user->prenom = $request->prenom;
    $user->email = $request->email;
    $user->ine = $request->ine;
    $user->telephone = $request->telephone;
    $user->password = Hash::make($request->password); // Hashage du mot de passe

    // Enregistrement des données dans la base de données
    if ($user->save()) {

        return redirect()->route('connexion')->with('success', 'Inscription réussie ! Connectez-vous maintenant.');

    } else {
        return back()->withInput()->withErrors(['error' => 'Une erreur s\'est produite lors de l\'inscription. Veuillez réessayer.']);
    }
}

}
