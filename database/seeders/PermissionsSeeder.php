<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [

            // Promotions
            'promotion.create',
            'promotion.view',
            'promotion.update',
            'promotion.delete',
            'promotion.verify',
            'promotion.approve',
            'promotion.reject',
            'promotion.apply',
            'promotion.archive',

            // Budget
            'budget.validate',
            'budget.modify',

            // Gestion utilisateurs & rôles
            'users.manage',
            'roles.manage',
            'permissions.manage',

            // Système
            'system.logs',
            'system.settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'Root',
            ]);
        }
    }
}
