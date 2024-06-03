<?php


namespace App\Http\Controllers\Ressources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ues;
use Illuminate\Support\Facades\Auth;

class UesController extends Controller
{
    // Afficher tous les u_e_s
    public function index()
    {
        $user = Auth::user();
        $ues = Ues::all();
        return view('ressources.U_E_S.home', compact('ues', 'user'));
    }

    // Afficher le formulaire de création d'une u_e_s
    public function create()
    {
        $user = Auth::user();
        $ues = Ues::all();
        return view('ressources.U_E_S.creer', compact('ues', 'user'));
    }

    // Enregistrer une nouvelle u_e_s
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:ues',
            'nom' => 'required',
            'credit' => 'required|integer|min:0',
        ]);

        Ues::create($request->all());

        return redirect()->route('ues.index')
            ->with('success', 'UES créée avec succès.');
    }

    // Afficher les détails d'une u_e_s
    public function show(Ues $ues)
    {
        return view('ues.show', compact('ues'));
    }

    // Afficher le formulaire d'édition d'une u_e_s
    public function edit(Ues $ues)
    {
        $user = Auth::user();
        return view('ressources.U_E_S.modifier', compact('ues','user'));
    }

    // Mettre à jour une u_e_s
    public function update(Request $request, Ues $ues)
    {
        $request->validate([
            'code' => 'required|unique:ues,code,'.$ues->id,
            'nom' => 'required',
            'credit' => 'required|integer|min:0',
        ]);

        $ues->update($request->all());

        return redirect()->route('ues.index')
            ->with('success', 'UES mise à jour avec succès.');
    }

    // Supprimer une u_e_s
    public function destroy(Ues $ues)
    {
        $ues->delete();

        return redirect()->route('ues.index')
            ->with('success', 'UES supprimée avec succès.');
    }
}
