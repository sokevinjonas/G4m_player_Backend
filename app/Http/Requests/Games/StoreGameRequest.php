<?php

namespace App\Http\Requests\Games;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
            'description' => 'nullable|string',
            'type_game_id' => 'required|exists:types_games,id',
            'contact_link' => 'nullable|array',
            'contact_link.*.type' => 'nullable|string|max:50',
            'contact_link.*.url' => 'nullable|url|max:255',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du jeu est requis.',
            'logo.required' => 'Le logo du jeu est requis.',
            'logo.image' => 'Le logo doit être une image.',
            'logo.max' => 'Le logo ne doit pas dépasser 2 Mo.',
            'type_game_id.required' => 'Le type de jeu est requis.',
            'type_game_id.exists' => 'Le type de jeu sélectionné n\'existe pas.',
            'contact_link.array' => 'Les liens de contact doivent être un tableau.',
            'contact_link.*.type.string' => 'Le type de contact doit être une chaîne de caractères.',
            'contact_link.*.type.max' => 'Le type de contact ne doit pas dépasser 50 caractères.',
            'contact_link.*.url.url' => 'L\'URL du contact doit être une URL valide.',
            'contact_link.*.url.max' => 'L\'URL du contact ne doit pas dépasser 255 caractères.',
        ];
    }
}
