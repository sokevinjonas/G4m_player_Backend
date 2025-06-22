<?php

namespace App\Http\Requests\Tournaments;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionsRequest extends FormRequest
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
            'game_id' => 'required|exists:games,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'mode' => 'nullable|in:solo,duo,squad',
            'is_online' => 'required|boolean',
            'location' => 'nullable|string|max:255',
            'reward' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed,cancel',
            'rules' => 'nullable|array',
            'rules.*' => 'nullable|string|max:255',
            'contact_link' => 'nullable|array',
            'contact_link.*.type' => 'nullable|string|max:50',
            'contact_link.*.url' => 'nullable|url|max:255',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'game_id.required' => 'Le jeu est requis.',
            'game_id.exists' => 'Le jeu sélectionné n\'existe pas.',
            'title.required' => 'Le titre est requis.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'date.required' => 'La date est requise.',
            'date.date' => 'La date doit être une date valide.',
            'mode.in' => 'Le mode doit être l\'un des suivants : solo, duo, squad.',
            'is_online.required' => 'Le statut en ligne est requis.',
            'is_online.boolean' => 'Le statut en ligne doit être vrai ou faux.',
            'location.string' => 'L\'emplacement doit être une chaîne de caractères.',
            'location.max' => 'L\'emplacement ne doit pas dépasser 255 caractères.',
            'reward.string' => 'La récompense doit être une chaîne de caractères.',
            'reward.max' => 'La récompense ne doit pas dépasser 255 caractères.',
            'status.required' => 'Le statut est requis.',
            'status.in' => 'Le statut doit être l\'un des suivants : upcoming, ongoing, completed, cancel.',
            'rules.array' => 'Les règles doivent être un tableau.',
            'rules.*.string' => 'Chaque règle doit être une chaîne de caractères.',
            'rules.*.max' => 'Chaque règle ne doit pas dépasser 255 caractères.',
            'contact_link.array' => 'Les liens de contact doivent être un tableau.',
            'contact_link.*.type.string' => 'Le type de lien de contact doit être une chaîne de caractères.',
            'contact_link.*.type.max' => 'Le type de lien de contact ne doit pas dépasser 50 caractères.',
            'contact_link.*.url.url' => 'L\'URL du lien de contact doit être une URL valide.',
            'contact_link.*.url.max' => 'L\'URL du lien de contact ne doit pas dépasser 255 caractères.',
        ]; 
    }
}
