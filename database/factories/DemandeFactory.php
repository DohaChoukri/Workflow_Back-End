<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Progress;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'remise' => $this->faker->numberBetween(5, 40),
            'date_debut' => now(),
            'date_fin' => now()->addDays(10),
            'motif' => $this->faker->sentence(),
            'statut' => 'brouillon',
            // assign an existing progress step if available, otherwise leave null
            // progress_id must reference the primary key (id) of progresses
            'progress_id' => Progress::inRandomOrder()->value('id') ?? null,
            // assign a random client_id and populate client name
            'client_id' => Client::inRandomOrder()->value('id') ?? null,
            'client' => function (array $attributes) {
                return $attributes['client_id'] ? Client::find($attributes['client_id'])?->nom : null;
            },
            'objectif' => $this->faker->sentence(),
        ];
    }
}
