<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sujet' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contacts = new Contact();

        // liasion migration model
    $contacts->nom = $request->nom;
    $contacts->email = $request->email;
    $contacts->sujet= $request->sujet;
    $contacts->message = $request->message;
    $contacts->save();

    if ($contacts->save()) {

        return redirect()->route('home')->with('success', 'Votre message a été envoyé avec succès ! Nous vous contacterons bientôt dans votre email.');
    }
  }
}
