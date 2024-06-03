<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $users = User::all();
        return view('dashboard.admin.usersList', compact('users', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userShow', compact( 'user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userEditForm', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'       => 'required|min:1|max:256',
            'email'      => 'required|email|max:256'

        ]);
        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');

        $user->save();
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('afficheusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('users.index');
    }

    public function connectTelegram(Request $request)
    {
        $telegram_id = $request->input('telegram_id');
        $user = User::where('telegram_id', $telegram_id)->first();

        if ($user) {
            // L'utilisateur est déjà enregistré, rien à faire
            return response()->json(['message' => 'Utilisateur déjà enregistré']);
        } else {
            // Enregistrement du nouvel utilisateur
            $newUser = User::create([
                'nom' => $request->input('name'),
                'telegram_id' => $telegram_id
            ]);

            return response()->json(['message' => 'Utilisateur enregistré avec succès']);
        }
    }

    public function connectTelegramClient(Request $request)
    {
        $telegram_id = $request->input('telegram_id');
        $name = $request->input('nom');

        // Envoi de l'ID Telegram de l'utilisateur à votre application
        $response = Http::post('https://votre-domaine.com/connect-telegram', [
            'telegram_id' => $telegram_id,
            'nom' => $nom
        ]);

        // Gérer la réponse de l'application
        $responseBody = $response->json();

        // Afficher la réponse
        return $responseBody['message'];
    }
}
