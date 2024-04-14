<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class ChefAdController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('private.utilisateur', compact('users', 'roles'));
    }

    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->sync($request->roles); // Assigne les rôles sélectionnés à l'utilisateur
        return redirect()->back()->with('success', 'Les rôles ont été mis à jour.');
    }
}

