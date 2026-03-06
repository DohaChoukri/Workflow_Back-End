<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class PersonalAccessTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            // Supprime les anciens tokens (optionnel)
            $user->tokens()->delete();

            // Crée un nouveau token
            $token = $user->createToken('API Token')->plainTextToken;

            // Afficher le token dans la console (optionnel)
            $this->command->info("Token créé pour {$user->email}: $token");
        }
    }
}
