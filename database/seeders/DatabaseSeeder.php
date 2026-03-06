<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProgressSeeder::class,
            ClientSeeder::class,
            UserSeeder::class,
            PersonalAccessTokensSeeder::class,
            RolesSeeder::class,
            UserRoleSeeder::class,
            PermissionsSeeder::class,
            RolePermissionSeeder::class,
            ProduitSeeder::class,
            DemandeSeeder::class,
            DemandeProduitSeeder::class,
        ]);

    }
}
