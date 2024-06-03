<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'telegram_id' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $this->user->id,
        'ine' => 'required|string|max:255',
        //'module_id' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'password' => 'nullable|string|min:8',
        'role' => 'required|string|in:enseignant,etudiant,chefdepart',
        // Ajoutez d'autres règles de validation au besoin
    ];
}

}
