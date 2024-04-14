<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Http\Requests\PropertyFormRequest;
use Illuminate\Support\Facades\Validator;
use App\Imports\ModeleImport; // Importez la classe Validator


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();


    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = $user->properties()->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.properties.index', compact('properties') , ['user' => $user]);

        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
        // return view('admin.properties.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Passer l'utilisateur à la vue
            return view('admin.properties.form', ['property' => new Property(), 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
{
    // Validation des données de la requête
    $validator = Validator::make($request->all(), [
        'jour_debut' => 'required',
        'jour_fin' => 'required',
        'heure_debut' => 'required',
        'heure_fin' => 'required',
        'enseignant' => 'required',
        'module' => 'required',
        'ufr' => 'required',
        'filiere' => 'required',
        'promotion' => 'required',
        'semestre' => 'required',
        'lieu' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Création d'une nouvelle instance du modèle Property
    $properties = new Property();

    // Assignation de l'ID de l'utilisateur connecté
    $properties->user_id = Auth::id();

    // Assignation des autres propriétés
    $properties->jour_debut = $request->jour_debut;
    $properties->jour_fin = $request->jour_fin;
    $properties->heure_debut = $request->heure_debut;
    $properties->heure_fin = $request->heure_fin;
    $properties->enseignant = $request->enseignant;
    $properties->module = $request->module;
    $properties->ufr = $request->ufr;
    $properties->filiere = $request->filiere;
    $properties->promotion = $request->promotion;
    $properties->semestre = $request->semestre;
    $properties->lieu = $request->lieu;

    // Enregistrement de l'instance dans la base de données
    if ($properties->save()) {
        return redirect()->route('admin.property.index')->with('success', 'Programme créé avec succès! Éditer ou supprimer.');
    } else {
        // Gérer l'échec de l'enregistrement
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du programme.');
    }
}

/**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Code pour afficher une propriété spécifique (à faire)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        // Code pour afficher le formulaire d'édition d'une propriété spécifique (à faire)
         // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Passer l'utilisateur à la vue
            return view('admin.properties.form', ['property' => $property, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
 {
        // Code pour mettre à jour une propriété spécifique dans la base de données (à faire)

        $property->update($request->validated());
        return redirect()->route('admin.property.index')->with('success', ' Programme modifier avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
{
    $property->delete();
        // Code pour supprimer une propriété spécifique de la base de données (à faire)
        return redirect()->route('admin.property.index')->with('success', ' Programme supprimer avec succes!');
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

        return view('admin.properties.index', compact('properties') ,  ['user' => $user]);
    }
}
