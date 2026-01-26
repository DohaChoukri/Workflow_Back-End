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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
        ]);

        $this->call([
            // PermissionsSeeder::class,
            RolesSeeder::class,
            RolePermissionSeeder::class,
            UserRoleSeeder::class,
            ClientSeeder::class,
            ProduitSeeder::class,
            // PromoSeeder::class,
            // PromoLineDetailSeeder::class,
            // PersonnalAccessTokensSeeder::class,
        ]);
    }
}
