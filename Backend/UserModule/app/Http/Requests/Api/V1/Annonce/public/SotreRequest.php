<?php

namespace App\Http\Requests\Api\V1\Annonce\public;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class SotreRequest extends FormRequest
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
            "titre"=> "required|string",
            "delai" => "required|date",
            "isVisible" => "boolean",
            "remuneration" => "numeric|required",
            "description" => "required|string",
            "competences" => "required|array",
            "experience_id" => "required|string",
            "pay_id" => "required|numeric",
            "ville_id" => "required|numeric",
            "quartier_id" => "required|numeric",
            // "pieceJointe" => "required|array",
            // "pieceJointe.*" => "file|max:2048",

        ];
    }

    public function messages()
    {
        return  [
            "delai.required" => "Le champ 'délai' est obligatoire.",
            "delai.date" => "Le champ 'délai' doit être une date valide.",

            "isVisible.boolean" => "Le champ 'visibilité' doit être vrai ou faux.",

            "remuneration.required" => "Le champ 'rémunération' est obligatoire.",
            "remuneration.numeric" => "Le champ 'rémunération' doit être un nombre valide.",

            "description.required" => "Le champ 'description' est obligatoire.",
            "description.string" => "Le champ 'description' doit être une chaîne de caractères.",

            "competences.required" => "Le champ 'compétences' est obligatoire.",
            "competences.array" => "Le champ 'compétences' doit être un tableau.",

            "experience_id.required" => "Le champ 'expérience' est obligatoire.",
            "experience_id.string" => "Le champ 'expérience' doit être une chaîne de caractères.",
            "experience_id.numeric" => "Le champ 'expérience' doit être un nombre valide.",

            "pay_id.required" => "Le champ 'pays' est obligatoire.",
            "pay_id.numeric" => "Le champ 'pays' doit être un nombre valide.",

            "ville_id.required" => "Le champ 'ville' est obligatoire.",
            "ville_id.numeric" => "Le champ 'ville' doit être un nombre valide.",

            "quartier_id.required" => "Le champ 'quartier' est obligatoire.",
            "quartier_id.numeric" => "Le champ 'quartier' doit être un nombre valide.",

            "pieceJointe.required" => "Le champ 'pièce jointe' est obligatoire.",
            "pieceJointe.array" => "Le champ 'pièce jointe' doit être un tableau.",
            "pieceJointe.*.file" => "Chaque élément de 'pièce jointe' doit être un fichier valide.",
            "pieceJointe.*.max" => "Chaque fichier ne doit pas dépasser 2 Mo.",
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
