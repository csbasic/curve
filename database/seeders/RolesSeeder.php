<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Editor']);
        Role::create(['name' => 'Moderator']);
        Role::create(['name' => 'Administrator']);
    }
}
