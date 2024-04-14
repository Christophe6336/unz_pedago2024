<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;

class ChefController extends Controller
{

    public function index()
    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();


    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = Property::orderBy('created_at', 'desc')->paginate(10);

    return view('private.chef.chef', compact('properties') , ['user' => $user]);


    }
    public function destroy(Property $property)
{
   $property->delete();

        // Code pour supprimer une propriété spécifique de la base de données (à faire)
        return redirect()->route('chef')->with('success', ' Programme supprimer avec succes!');
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

        return view('private.chef.chef', compact('properties') ,  ['user' => $user]);
    }
}
