<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client' => ['nullable', 'string', 'max:255'],
            'remise' => ['required', 'integer', 'min:0'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
            'motif' => ['nullable', 'string'],
            'objectif' => ['nullable', 'string'],
            'products' => ['nullable', 'array'],
            'products.*.produit_id' => ['required_with:products', 'integer', 'exists:produits,id'],
            'products.*.quantite' => ['nullable', 'integer', 'min:1'],
            'products.*.prix_initial' => ['nullable', 'numeric', 'min:0'],
            'products.*.prix_promo' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
