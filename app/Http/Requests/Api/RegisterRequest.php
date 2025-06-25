<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:16|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'country' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'referred_by' => 'nullable|string|exists:users,referral_code',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom d\'utilisateur est obligatoire.',
            'name.string' => 'Le nom d\'utilisateur doit être une chaîne de caractères.',
            'name.min' => 'Le nom d\'utilisateur doit contenir au moins 3 caractères.',
            'name.max' => 'Le nom d\'utilisateur ne doit pas dépasser 16 caractères.',
            'name.unique' => 'Ce nom d\'utilisateur est déjà utilisé.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, des lettres minuscules, au moins un chiffre et un caractère spécial.',
            'referred_by.exists' => 'Le code de parrainage est invalide.',
        ];
    }
}
