<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Progress;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            ['code' => 0,  'label' => 'Lancer demande de promo', 'description' => 'Création initiale de la demande'],
            ['code' => 10, 'label' => 'Soumettre', 'description' => 'Demande soumise par la commerciale'],
            ['code' => 20, 'label' => 'Vérification', 'description' => 'Vérification par le trade marketing'],
            ['code' => 30, 'label' => 'Valider (Trade Marketing)', 'description' => 'Validation par le trade marketing'],
            ['code' => 40, 'label' => 'Valider (Contrôle de gestion)', 'description' => 'Validation par le contrôle de gestion'],
            ['code' => 50, 'label' => 'Acceptation finale (Direction)', 'description' => 'Décision finale de la direction'],
        ];

        foreach ($steps as $step) {
            Progress::updateOrCreate(
                ['code' => $step['code']],
                ['label' => $step['label'], 'description' => $step['description']]
            );
        }
    }
}
