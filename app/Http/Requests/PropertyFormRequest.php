<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
           'jour_fin'=>['required'],
            'jour_debut'=>['required'],
            'heure_fin'=>['required'],
            'heure_debut'=>['required'],
            'enseignant'=>['required'],
            'module'=>['required'],
            'ufr'=>['required'],
            'filiere'=>['required'],
            'promotion'=>['required', 'integer', 'min:1'],
            'semestre'=>['required'],
            'lieu'=>['required'],


]
            ;
    }
}
