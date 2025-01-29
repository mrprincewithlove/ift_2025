<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class NumberPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'number.index', 'group' => 'number', 'created_at' => now()]);
        Permission::create(['name' => 'number.create', 'group' => 'number', 'created_at' => now()]);
        Permission::create(['name' => 'number.update', 'group' => 'number', 'created_at' => now()]);
        Permission::create(['name' => 'number.delete', 'group' => 'number', 'created_at' => now()]);

        Menu::create(['name' => 'number', 'created_at' => now()]);
    }
}
