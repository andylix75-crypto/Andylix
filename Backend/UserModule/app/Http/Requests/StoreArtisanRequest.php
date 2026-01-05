<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class StoreArtisanRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name',
            'first_name' => 'required|string|unique:users,first_name',
            'profil' => 'required|file',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|integer',
            'genre' => 'required|string',
            'is_available' => 'required|boolean',
            // localisation
            'ville' => 'required|string', //no
            'quartier' => 'required|string', //no
            'pays' => 'required|string', //no
            'adresse' => 'required|string',
            'postal' => 'required|numeric',
            // metier
            'metier' => 'required|string', //no
            'specialite' => 'required|string', //no
            'expérience' => 'required|integer', //no
            'langue' => 'required|string', //no
            'entreprise' => 'required|string', //no
            'description' => 'required|string', //no
            // disponibilite
            'jours' => 'required|array', //no  
            // 'heur_debut' => 'required|array|date_format:H:i', //no  
            // 'heur_fin' => 'required|array|date_format:H:i|after:heur_debut', //no  
            'is_urgent' => 'required|boolean',
            'is_week_end' => 'required|boolean',
            'is_feries' => 'required|boolean',
            // paiement
            'mode_payment' => 'required|string',
            'is_payment_sequestre' => 'required|boolean',
            // documents justificatifs
            'identification' => 'required|file',
            'diplome' => 'required|file',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le champ "Nom" est obligatoire.',
            'name.string' => 'Le champ "Nom" doit être une chaîne de caractères.',
            'name.unique' => 'Ce nom est déjà utilisé.',

            'first_name.required' => 'Le champ "Prénom" est obligatoire.',
            'first_name.string' => 'Le champ "Prénom" doit être une chaîne de caractères.',
            'first_name.unique' => 'Ce prénom est déjà utilisé.',

            'profil.required' => 'Le champ "Profil" est obligatoire.',
            'profil.file' => 'Le champ "Profil" doit être un fichier valide.',

            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'date_naissance.date' => 'La date de naissance doit être une date valide.',

            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être un format valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',

            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.integer' => 'Le numéro de téléphone doit être un entier.',

            'genre.required' => 'Le genre est obligatoire.',
            'genre.string' => 'Le genre doit être une chaîne de caractères.',

            'is_available.required' => 'La disponibilité est obligatoire.',
            'is_available.boolean' => 'La disponibilité doit être vrai ou faux.',

            // localisation
            'ville.required' => 'La ville est obligatoire.',
            'ville.string' => 'La ville doit être une chaîne de caractères.',

            'quartier.required' => 'Le quartier est obligatoire.',
            'quartier.string' => 'Le quartier doit être une chaîne de caractères.',

            'pays.required' => 'Le pays est obligatoire.',
            'pays.string' => 'Le pays doit être une chaîne de caractères.',

            'adresse.required' => 'L\'adresse est obligatoire.',
            'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',

            'postal.required' => 'Le code postal est obligatoire.',
            'postal.numeric' => 'Le code postal doit être un nombre.',

            // metier
            'metier.required' => 'Le métier est obligatoire.',
            'metier.string' => 'Le métier doit être une chaîne de caractères.',

            'specialite.required' => 'La spécialité est obligatoire.',
            'specialite.string' => 'La spécialité doit être une chaîne de caractères.',

            'expérience.required' => 'L\'expérience est obligatoire.',
            'expérience.integer' => 'L\'expérience doit être un entier.',

            'langue.required' => 'La langue est obligatoire.',
            'langue.string' => 'La langue doit être une chaîne de caractères.',

            'entreprise.required' => 'L\'entreprise est obligatoire.',
            'entreprise.string' => 'L\'entreprise doit être une chaîne de caractères.',

            'description.required' => 'La description est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',

            // disponibilite
            'jours.required' => 'Les jours sont obligatoires.',
            'jours.array' => 'Les jours doivent être un tableau.',

            // 'heur_debut.required' => 'L\'heure de début est obligatoire.',
            // 'heur_debut.array' => 'L\'heure de début doit être un tableau.',
            // 'heur_debut.date_format' => 'L\'heure de début doit avoir le format H:i.',

            // 'heur_fin.required' => 'L\'heure de fin est obligatoire.',
            // 'heur_fin.array' => 'L\'heure de fin doit être un tableau.',
            // 'heur_fin.date_format' => 'L\'heure de fin doit avoir le format H:i.',
            // 'heur_fin.after' => 'L\'heure de fin doit être après l\'heure de début.',

            'is_urgent.required' => 'L\'urgence est obligatoire.',
            'is_urgent.boolean' => 'L\'urgence doit être vrai ou faux.',

            'is_week_end.required' => 'Le week-end est obligatoire.',
            'is_week_end.boolean' => 'Le week-end doit être vrai ou faux.',

            'is_feries.required' => 'Les jours fériés sont obligatoires.',
            'is_feries.boolean' => 'Les jours fériés doivent être vrai ou faux.',

            // paiement
            'mode_payment.required' => 'Le mode de paiement est obligatoire.',
            'mode_payment.string' => 'Le mode de paiement doit être une chaîne de caractères.',

            'is_payment_sequestre.required' => 'Le paiement séquestré est obligatoire.',
            'is_payment_sequestre.boolean' => 'Le paiement séquestré doit être vrai ou faux.',

            // documents justificatifs
            'identification.required' => 'Le document d\'identification est obligatoire.',
            'identification.file' => 'Le document d\'identification doit être un fichier valide.',

            'diplome.required' => 'Le diplôme est obligatoire.',
            'diplome.file' => 'Le diplôme doit être un fichier valide.'

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
