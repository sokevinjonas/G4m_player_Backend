<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow authenticated users to update their profile
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $this->user()->id,
            'description' => 'sometimes|string|max:1000',
            'country' => 'sometimes|string|max:255',
            'avatar' => 'sometimes|file|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // File upload (2MB max)
            'password' => 'sometimes|string|min:8|confirmed',
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'description.max' => 'La description ne peut pas dépasser 1000 caractères.',
            'country.max' => 'Le pays ne peut pas dépasser 255 caractères.',
            'avatar.file' => 'L\'avatar doit être un fichier.',
            'avatar.image' => 'L\'avatar doit être une image.',
            'avatar.mimes' => 'L\'avatar doit être au format jpeg, png, jpg, gif ou webp.',
            'avatar.max' => 'L\'avatar ne peut pas dépasser 2 Mo.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}