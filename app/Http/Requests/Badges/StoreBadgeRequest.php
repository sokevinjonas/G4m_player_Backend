<?php

namespace App\Http\Requests\Badges;

use Illuminate\Foundation\Http\FormRequest;

class StoreBadgeRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:badges,name',
            'icon' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'grade' => 'required|string|unique:badges,grade',
            'is_active' => 'required|boolean',
            'required_points' => 'required|integer|min:0',
            'required_wins' => 'required|integer|min:0',
            'required_participations' => 'required|integer|min:0',
            'required_top3' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du badge est obligatoire.',
            'name.unique' => 'Ce nom de badge existe déjà.',
            'icon.image' => 'L’icône doit être une image.',
            'icon.max' => 'L’icône ne doit pas dépasser 2 Mo.',
            'grade.required' => 'Le grade est obligatoire.',
            'grade.unique' => 'Ce grade existe déjà.',
            'is_active.required' => 'Le statut d’activation est obligatoire.',
            'is_active.boolean' => 'Le statut d’activation doit être vrai ou faux.',
            'required_points.required' => 'Les points requis sont obligatoires.',
            'required_wins.required' => 'Les victoires requises sont obligatoires.',
            'required_participations.required' => 'Les participations requises sont obligatoires.',
            'required_top3.required' => 'Le nombre de top 3 requis est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'icon.image' => 'L’icône doit être une image valide.',
            'icon.max' => 'L’icône ne doit pas dépasser 2 Mo.',
            'required_points.integer' => 'Les points requis doivent être un nombre.',
            'required_points.min' => 'Les points requis doivent être positifs.',
            'required_wins.integer' => 'Les victoires requises doivent être un nombre.',
            'required_participations.integer' => 'Les participations requises doivent être un nombre.',
            'required_top3.integer' => 'Le nombre de top 3 doit être un nombre.',
        ];
    }
}
