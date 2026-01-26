<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::create(['name' => 'admin', 'guard_name' => 'web']);
        \App\Models\Role::create(['name' => 'manager', 'guard_name' => 'web']);
        \App\Models\Role::create(['name' => 'user', 'guard_name' => 'web']);
    }
}
