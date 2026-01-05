<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            // users
            'name' => 'required|string|unique:users,name',
            'first_name' => 'required|string|unique:users,first_name',
            'profil' => 'required|file',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'phone' => 'required|integer',
            'genre' => 'required|string',
            // adresses
            'adresse' => 'required',
            // langues
            'langue' => 'required|string',
            // clients
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le champ nom est obligatoire.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

            'first_name.required' => 'Le champ "Prénom" est obligatoire.',
            'first_name.string' => 'Le champ "Prénom" doit être une chaîne de caractères.',
            'first_name.unique' => 'Ce prénom est déjà utilisé.',

            'profil.required' => 'Le champ "Profil" est obligatoire.',
            'profil.file' => 'Le champ "Profil" doit être un fichier valide.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'phone.required' => 'numero de telephone obligatoire',
            'genre.required' => 'champ obligatoire',
            'adresse.required' => 'champ obligatoire',
            // langue
            'langue.required' => 'champ obligatoire',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all(); // Récupère les messages d'erreur sous forme de tableau

        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422)); // 422 Unprocessable Entity
    }
}
