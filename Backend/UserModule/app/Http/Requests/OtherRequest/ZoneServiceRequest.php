<?php

namespace App\Http\Requests\OtherRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class ZoneServiceRequest extends FormRequest
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
            'zone_service' => 'required|string|unique:zone_services'
        ];
    }

    public function messages()
    {
        return [
            'zone_service.required' => 'Le champ  est obligatoire.',
            'zone_service.unique' => 'Ceci existe déjà.',

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
