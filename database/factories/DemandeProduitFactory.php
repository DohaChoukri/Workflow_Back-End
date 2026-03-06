<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Demande;
use App\Models\Produit;

class DemandeProduitFactory extends Factory
{
    public function definition(): array
    {
        $prix = $this->faker->randomFloat(2, 5, 200);

        return [
            'demande_id' => Demande::factory(),
            'produit_id' => Produit::factory(),
            'quantite' => $this->faker->numberBetween(10, 100),
            'prix_initial' => $prix,
            'prix_promo' => $prix * 0.8, // remise 20%
        ];
    }
}
