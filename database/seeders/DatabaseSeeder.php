<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $customerRole = Role::firstOrCreate([
        'name' => 'customer'
    ]);

    $adminRole = Role::firstOrCreate([
        'name' => 'admin'
    ]);


    User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role_id' => $adminRole->id,
    ]);


    User::factory()->create([
        'name' => 'Test Customer',
        'email' => 'customer@example.com',
        'password' => Hash::make('password'),
        'role_id' => $customerRole->id,
    ]);
}
}
