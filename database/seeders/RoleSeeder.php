<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Moderator']);
        Role::create(['name' => 'Masuer']);
        Role::create(['name' => 'Accountant']);
        Role::create(['name' => 'Trainer']);
        Role::create(['name' => 'Client']);
    }
}
