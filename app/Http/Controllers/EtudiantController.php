<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;


class EtudiantController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();


    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = Property::orderBy('created_at', 'desc')->paginate(10);

    return view('dashboard.etudiant', compact('properties') , ['user' => $user]);

        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
    }

    public function recherche(Request $request)
    {
        $user = Auth::user();

        $query = $request->input('query');

        $properties = Property::where('filiere', 'LIKE', '%' . $query . '%')
        ->orWhere('promotion', 'LIKE', '%' . $query . '%')
        ->orWhere('enseignant', 'LIKE', '%' . $query . '%')
        ->orWhere('ufr', 'LIKE', '%' . $query . '%')
        ->orWhere('semestre', 'LIKE', '%' . $query . '%')
        ->orWhere('lieu', 'LIKE', '%' . $query . '%')
        ->orWhere('module', 'LIKE', '%' . $query . '%')
        ->paginate();

        return view('dashboard.etudiant', compact('properties') ,  ['user' => $user]);
    }
}
