<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Module;
use App\Models\Cahier;
use App\Models\Ufr;
use App\Models\AnneeAcademique;
use App\Http\Requests\PropertyFormRequest;


class EtudiantController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer le nom de l'UFR sélectionnée à partir de la requête
        $ufrNom = $request->input('ufr');

        // Rechercher l'UFR par son nom
        $ufr = UFR::where('nom', $ufrNom)->first();

        // Vérifier si l'UFR existe
        if ($ufr) {
            // Filtrer les propriétés en fonction de l'UFR sélectionnée
            $properties = Property::where('ufr_id', $ufr->id)
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(10);
        } else {
            // Gérer le cas où l'UFR n'est pas trouvé
            // Par exemple, retourner une vue avec un message d'erreur
            $properties = collect();
        }

        return view('dashboard.etudiant', compact('properties', 'ufrNom', 'user'));
    }


    public function home()
    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();

    $cahiers = Cahier::all();
    // Récupérer les propriétés associées à l'utilisateur connecté
    $properties = Property::orderBy('created_at', 'desc')->paginate(10);

    return view('dashboard.homeetudiant', compact('properties','cahiers') , ['user' => $user]);

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
        ->orWhere('batiment', 'LIKE', '%' . $query . '%')
        ->orWhere('salle', 'LIKE', '%' . $query . '%')
        ->paginate();

        return view('dashboard.etudiant', compact('properties') ,  ['user' => $user]);
    }
    public function cahier(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $cahiers = Cahier::all();
        $annee_academiques = AnneeAcademique::all();
        // Récupérer l'UFR sélectionnée à partir de la requête
        $ufrs = $request->input('ufr');

        // Filtrer les propriétés en fonction de l'UFR sélectionnée
        $properties = Property::where('ufr_id', $ufrs)->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.cahier', compact('properties', 'ufrs', 'user','cahiers','annee_academiques'));
    }
    public function cahiercreat(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $modules = Module::all();
        $cahiers = Cahier::all();
        $annee_academiques = AnneeAcademique::all();
        // Récupérer l'UFR sélectionnée à partir de la requête
        $ufrs = $request->input('ufr');

        // Filtrer les propriétés en fonction de l'UFR sélectionnée
        $properties = Property::where('ufr_id', $ufrs)->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.cahiercreat', compact('properties', 'ufrs', 'user', 'modules','cahiers','annee_academiques'));
    }
    public function creerFicheSeance(Request $request)
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
        $user = Auth::user();
        $modules = Module::all();
        $cahiers = Cahier::all();
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'contenu' => 'required',
            'module_id' => 'required',
            'annee_academique_id' => 'required',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, get the validated data
        $validatedData = $validator->validated();

        // Créer la fiche de séance pour l'étudiant actuellement connecté
        $cahier = new Cahier();
        $cahier->annee_academique_id = $validatedData['annee_academique_id'];
        $cahier->date = $validatedData['date'];
        $cahier->heure_debut = $validatedData['heure_debut'];
        $cahier->heure_fin = $validatedData['heure_fin'];
        $cahier->contenu = $validatedData['contenu'];
        $cahier->module_id = $validatedData['module_id'];

        $cahier->etudiant_id = auth()->id(); // Récupère l'ID de l'étudiant connecté
        $cahier->save();

        if ($request->isMethod('post')) {
            // Créez un nouveau cahier avec les données validées...
            // Redirigez vers la page d'affichage des cahiers après la création
            return redirect()->route('cahier')->with('success', 'La fiche de séance a été créée avec succès !');
        }

        // Si les données n'ont pas été soumises, affichez simplement la vue
        return view('dashboard.cahier', compact('properties', 'user', 'modules', 'cahiers'));
    }


}
