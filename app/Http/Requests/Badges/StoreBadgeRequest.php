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
            'required_points' => 'nullable|integer|min:0',
            'required_wins' => 'nullable|integer|min:0',
            'required_participations' => 'nullable|integer|min:0',
            'required_top3' => 'nullable|integer|min:0',
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
            'required_points.integer' => 'Les points requis doivent être un nombre.',
            'required_points.min' => 'Les points requis doivent être positifs.',
            'required_wins.integer' => 'Les victoires requises doivent être un nombre.',
            'required_participations.integer' => 'Les participations requises doivent être un nombre.',
            'required_top3.integer' => 'Le nombre de top 3 doit être un nombre.',
        ];
    }
}
