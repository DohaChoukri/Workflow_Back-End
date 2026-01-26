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
        Permission::create(['name' => 'view users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit users', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);
        Permission::create(['name' => 'view clients', 'guard_name' => 'web']);
        Permission::create(['name' => 'create clients', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit clients', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete clients', 'guard_name' => 'web']);
        Permission::create(['name' => 'view produits', 'guard_name' => 'web']);
        Permission::create(['name' => 'create produits', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit produits', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete produits', 'guard_name' => 'web']);
        Permission::create(['name' => 'view promos', 'guard_name' => 'web']);
        Permission::create(['name' => 'create promos', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit promos', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete promos', 'guard_name' => 'web']);
    }
}
