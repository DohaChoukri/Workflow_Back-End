<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\Role::where('name', 'admin')->first();
        $manager = \App\Models\Role::where('name', 'manager')->first();
        $user = \App\Models\Role::where('name', 'user')->first();

        $allPermissions = \App\Models\Permission::all()->pluck('id');
        $admin->permissions()->attach($allPermissions);

        $managerPermissions = \App\Models\Permission::whereIn('name', [
            'view users', 'view clients', 'create clients', 'edit clients',
            'view produits', 'create produits', 'edit produits',
            'view promos', 'create promos', 'edit promos'
        ])->pluck('id');
        $manager->permissions()->attach($managerPermissions);

        $userPermissions = \App\Models\Permission::whereIn('name', [
            'view clients', 'view produits', 'view promos'
        ])->pluck('id');
        $user->permissions()->attach($userPermissions);
    }
}
