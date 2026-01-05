<?php

namespace App\Http\Requests\OtherRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class StoreMetierRequest extends FormRequest
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
            'metier' => 'required|string|unique:metiers'
        ];
    }

    public function messages()
    {
        return [
            'metier.required' => 'Le champ  est obligatoire.',
            'metier.unique' => 'Ceci existe déjà.',

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
