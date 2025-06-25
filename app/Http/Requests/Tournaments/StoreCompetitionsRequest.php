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
            'date' => 'required|date|after:now',
            'mode' => 'nullable|in:solo,duo,squad',
            'max_participants' => 'required|integer|min:1|max:1000',
            'current_participants' => 'nullable|integer|min:0',
            'image' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'is_online' => 'required|boolean',
            'location' => 'nullable|required_if:is_online,false|string|max:255',
            'reward' => 'nullable|string|max:255',
            'status' => 'nullable|in:upcoming,ongoing,full,cancelled,completed',
            'rules' => 'nullable|array',
            'rules.*' => 'nullable|string|max:500',
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
            'date.after' => 'La date doit être dans le futur.',
            'mode.in' => 'Le mode doit être l\'un des suivants : solo, duo, squad.',
            'max_participants.required' => 'Le nombre maximum de participants est requis.',
            'max_participants.integer' => 'Le nombre maximum de participants doit être un nombre entier.',
            'max_participants.min' => 'Le nombre maximum de participants doit être au moins 1.',
            'max_participants.max' => 'Le nombre maximum de participants ne peut pas dépasser 1000.',
            'current_participants.integer' => 'Le nombre actuel de participants doit être un nombre entier.',
            'current_participants.min' => 'Le nombre actuel de participants ne peut pas être négatif.',
            'image.string' => 'L\'image doit être une chaîne de caractères.',
            'image.max' => 'L\'image ne doit pas dépasser 255 caractères.',
            'video.string' => 'La vidéo doit être une chaîne de caractères.',
            'video.max' => 'La vidéo ne doit pas dépasser 255 caractères.',
            'is_online.required' => 'Le statut en ligne est requis.',
            'is_online.boolean' => 'Le statut en ligne doit être vrai ou faux.',
            'location.required_if' => 'L\'emplacement est requis pour les compétitions hors ligne.',
            'location.string' => 'L\'emplacement doit être une chaîne de caractères.',
            'location.max' => 'L\'emplacement ne doit pas dépasser 255 caractères.',
            'reward.string' => 'La récompense doit être une chaîne de caractères.',
            'reward.max' => 'La récompense ne doit pas dépasser 255 caractères.',
            'status.in' => 'Le statut doit être l\'un des suivants : upcoming, ongoing, full, cancelled, completed.',
            'rules.array' => 'Les règles doivent être un tableau.',
            'rules.*.string' => 'Chaque règle doit être une chaîne de caractères.',
            'rules.*.max' => 'Chaque règle ne doit pas dépasser 500 caractères.',
            'contact_link.array' => 'Les liens de contact doivent être un tableau.',
            'contact_link.*.type.string' => 'Le type de lien de contact doit être une chaîne de caractères.',
            'contact_link.*.type.max' => 'Le type de lien de contact ne doit pas dépasser 50 caractères.',
            'contact_link.*.url.url' => 'L\'URL du lien de contact doit être une URL valide.',
            'contact_link.*.url.max' => 'L\'URL du lien de contact ne doit pas dépasser 255 caractères.',
        ]; 
    }
}
