<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Batiment;
use App\Models\Filiere;
use App\Models\AnneeAcademique;
use App\Services\TelegramService;
use App\Http\Requests\PropertyFormRequest;
use Telegram\Bot\Laravel\Facades\Telegram;

class ChefController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();
    $properties = Property::paginate(10);

    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = Property::orderBy('created_at', 'desc')->paginate(10);

    return view('private.chef.chef', compact('properties') , ['user' => $user]);
 }

 public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }


    public function supp(Property $property, TelegramService $telegramService,Request $request,)
    {
        $propertyjour_debut = $property->jour_debut;
        $propertyjour_fin = $property->jour_fin;
        $propertyheure_debut = $property->heure_debut;
        $propertyheure_fin = $property->heure_fin;
        $propertymodule_id = $property->module->nom;
        $propertyufr_id = $property->ufr->nom;
        $propertyfiliere_id = $property->filiere->nom;
        $propertypromotion_id = $property->promotion->annee;
        $propertyenseignant = $property->enseignant;
        $propertysemestre_id = $property->semestre->intitule;
        $propertybatiment_id = $property->batiment->nom;
        $propertysalle_id = $property->salle->nom;
        $propertyuser_id = $property->user_id;
        $propertyannee_academique_id = $property->annee_academique->annee;
        // Logique pour supprimer le programme
        $property->delete();
        $telegramUserId = $request->input('telegram_id');
        Telegram::sendMessage([
            "chat_id" =>$telegramUserId,
            "parse_mode" =>'HTML',
            "text" => "Bonjour Dr $propertyenseignant,
    à votre attention votre programme prevue le <b>$propertyjour_debut</b> au <b>$propertyjour_fin</b>  de l'année académique : <b>$propertyannee_academique_id</b> a été retirer par le chef de departement:
        Voici les details du programme retirer

    - Heure de début : <b>$propertyheure_debut</b>

    - Heure de fin : <b>$propertyheure_fin</b>

    - Module : <b>$propertymodule_id</b>

    - UFR : <b>$propertyufr_id</b>

    - Filière : <b>$propertyfiliere_id</b>

    - Semestre : <b>$propertysemestre_id</b>

    - Bâtiment : <b>$propertybatiment_id</b>

    - Salle : <b>$propertysalle_id</b>

    - Promotion : <b>$propertypromotion_id</b>

    Vous pouvez contactez le chef de département pour plus d 'information.

    Cordialement, UNZ_PEDAGO"
        ]);

        return redirect()->route('chef')->with('success', 'Le Programme supprimé avec succès!');
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

    public function action(Request $request, $propertyId)
{
    $action = $request->input('action');

switch ($action) {
            case 'valider':
                // Logique pour valider
                return redirect()->route('valider', $propertyId);
                break;
            case 'modifier':
                // Logique pour modifier
                return redirect()->route('modifier', $propertyId);
                break;
            case 'supprimer':
                // Logique pour supprimer
                return redirect()->route('destroy', $propertyId);
                break;
            default:
                // Gérer le cas par défaut
                break;
        }

}
public function setting(Property $property)
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();
    $annee_academiques = AnneeAcademique::all();
    $salles = Salle::all();
    $batiments = Batiment::all();
    $modules = Module::all();
    $filieres = Filiere::all();
    $properties = Property::orderBy('created_at', 'desc');
    $property = Property::orderBy('created_at', 'desc')->first();
    // Récupérer les propriétés associées à l'utilisateur connecté
    // Utilisez first() pour obtenir uniquement le premier élément

    return view('private.chef.set', compact('properties', 'property','user', 'annee_academiques','batiments','salles','modules','filieres'),['property' => $property, 'user' => $user]);
}




public function settingave(PropertyFormRequest $request, Property $property)
{
    //dd($request->all());
    $property = Property::findOrFail($property->id);
    $property->update($request->validated());

    $propertyjour_debut = $property->jour_debut;
        $propertyjour_fin = $property->jour_fin;
        $propertyheure_debut = $property->heure_debut;
   $propertyheure_fin = $property->heure_fin;
        $propertymodule_id = $property->module->nom;
        $propertyufr_id = $property->ufr->nom;
        $propertyfiliere_id = $property->filiere->nom;
        $propertypromotion_id = $property->promotion->annee;
        $propertyenseignant = $property->enseignant;
        $propertysemestre_id = $property->semestre->intitule;
   $propertybatiment_id = $property->batiment->nom;
   $propertysalle_id = $property->salle->nom;
   $propertyuser_id = $property->user_id;
   $propertyannee_academique_id = $property->annee_academique->annee;

   $telegramUserId = $request->input('telegram_id');
dd($telegramUserId);
   Telegram::sendMessage([
    "chat_id" => $telegramUserId ,
    "parse_mode" => 'HTML',
    "text" => "Bonjour Dr $propertyenseignant,

    Votre programme du <b>$propertyjour_debut</b> au <b>$propertyjour_fin</b> a été modifier par le chef de département avec success vérifier les details ci dessous :

             Année académique : <b>$propertyannee_academique_id</b>

    - Heure de début : <b>$propertyheure_debut</b>

    - Heure de fin : <b>$propertyheure_fin</b>

    - Module : <b>$propertymodule_id</b>

    - UFR : <b>$propertyufr_id</b>

    - Filière : <b>$propertyfiliere_id</b>

    - Semestre : <b>$propertysemestre_id</b>

    - Bâtiment : <b>$propertybatiment_id</b>

    - Salle : <b>$propertysalle_id</b>

    - Promotion : <b>$propertypromotion_id</b>

    Vous pouvez retirer le programme dans le tableau d' affichage

    Cordialement, UNZ_PEDAGO"
]);
        return redirect('chef')->with('success', 'Le Programme a été modifié avec succès!');


}
public function modul()
{
    // Récupérer les modules depuis la base de données
    $modules = Module::all(); // Ou utilisez la méthode appropriate pour récupérer les modules selon vos besoins
    $modules = Module::with('enseignant')->get();
    $annee_academiques = AnneeAcademique::all();
    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = Property::orderBy('created_at', 'desc')->get(); // Utilisez first() pour obtenir uniquement le premier élément

    // Passer les données à la vue
    return view('private.chef.homemod', compact('properties', 'user', 'modules','annee_academiques'));
}


}

