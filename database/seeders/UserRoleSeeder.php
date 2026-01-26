<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = \App\Models\User::where('email', 'admin@example.com')->first();
        $managerUser = \App\Models\User::where('email', 'manager@example.com')->first();
        $regularUser = \App\Models\User::where('email', 'user@example.com')->first();

        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $managerRole = \App\Models\Role::where('name', 'manager')->first();
        $userRole = \App\Models\Role::where('name', 'user')->first();

        if ($adminUser && $adminRole) {
            $adminUser->roles()->attach($adminRole, ['model_type' => \App\Models\User::class]);
        }
        if ($managerUser && $managerRole) {
            $managerUser->roles()->attach($managerRole, ['model_type' => \App\Models\User::class]);
        }
        if ($regularUser && $userRole) {
            $regularUser->roles()->attach($userRole, ['model_type' => \App\Models\User::class]);
        }
    }
}
