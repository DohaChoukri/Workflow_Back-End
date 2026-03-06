<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a known client named 'Informatique'
        Client::updateOrCreate(
            ['nom' => 'Informatique'],
            ['adresse' => 'Siège Informatique', 'email' => 'info@informatique.local', 'telephone' => '0000000000', 'actif' => true]
        );

        // create additional random clients
        \App\Models\Client::factory()->count(5)->create();
    }
}
