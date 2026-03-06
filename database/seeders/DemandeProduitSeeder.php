<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DemandeProduit;

class DemandeProduitSeeder extends Seeder
{
    public function run(): void
    {
        DemandeProduit::factory()->count(20)->create();
    }
}
