<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Role;
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootUser =User::where('email', 'root@example.com')->first();

        $rootRole = Role::where('name', 'Root')->first();

        if ($rootUser && $rootRole) {
            $rootUser->roles()->attach($rootRole, ['model_type' => User::class]);
        }
    }
}
