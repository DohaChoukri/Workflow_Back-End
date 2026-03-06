<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Root User',
            'email' => 'root@gmail.com',
            'email_verified_at'=> null,
            'password'=> bcrypt('1937@7391')
        ]);
    }
}
