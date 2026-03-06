<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Role;
use \App\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = Role::where('name', 'Root')->first();

        $allPermissions = Permission::all()->pluck('id');
        $root->permissions()->attach($allPermissions);
    }
}
