<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function create()
{
    // Récupérer les modules attribués à l'enseignant connecté
    $module = auth()->user()->modules;

    // Passer les modules à la vue
    return view('votre_vue', compact('enseignant_modules'));
}
}
