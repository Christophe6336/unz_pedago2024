<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function redirige(Request $request)
{
    return view('auth.connexion');
}


public function login(Request $request)
{
    // Valider les données soumises
    $validator = Validator::make(
        $request->all(),
        [
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Le champ mot de passe est requis.',
        ]
    );

    // On retourne toutes les erreurs
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Vérifier l'authentification de l'utilisateur
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials, $request->boolean('remember'))) {
        return redirect()->back()
            ->withErrors(['login' => 'Email ou mot de passe incorrect'])
            ->withInput();
    }

// Récupérer l'utilisateur authentifié
$user = Auth::user();

// Rediriger en fonction du rôle de l'utilisateur
if ($user->role === 'etudiant') {
    return redirect()->intended('/etudiant')->with('success', 'Vous êtes connecté au compte étudiant .Bienvenue à UNZ-PEDAGO');;
} elseif ($user->role === 'enseignant') {
    return redirect()->intended('/admin/property')->with('success', 'Vous êtes connecté au compte Professeur avec succès.Bienvenue à UNZ-PEDAGO');;
} elseif ($user->role === 'chefdepart') {
    return redirect()->intended('/chef')->with('success', 'Vous êtes connecté au compte du Chef de departement avec succès.');;
}

}

}

