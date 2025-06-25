<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionsUserRequest extends FormRequest
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
            'competition_id' => 'required|exists:competitions,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'competition_id.required' => 'L\'ID de la compétition est requis.',
            'competition_id.exists' => 'Cette compétition n\'existe pas.',
            'user_id.required' => 'L\'ID de l\'utilisateur est requis.',
            'user_id.exists' => 'Cet utilisateur n\'existe pas.',
        ];
    }
}
