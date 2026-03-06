<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            // ensure unique product reference to avoid FK/unique constraint failures during seeding
            'reference' => strtoupper($this->faker->unique()->bothify('PRD000000###')),
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2, 5, 200),
            'stock' => $this->faker->numberBetween(0, 500),
            'image' => null,
            'actif' => true,
        ];
    }
}
