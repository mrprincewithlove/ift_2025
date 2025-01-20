<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin.home', 'group' => 'home', 'created_at' => now()]);

        Permission::create(['name' => 'role.index', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.create', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.update', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.delete', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.permission-read', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.permission-update', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.menu-read', 'group' => 'role', 'created_at' => now()]);
        Permission::create(['name' => 'role.menu-update', 'group' => 'role', 'created_at' => now()]);

        Permission::create(['name' => 'permission.index', 'group' => 'permission', 'created_at' => now()]);
        Permission::create(['name' => 'permission.create', 'group' => 'permission', 'created_at' => now()]);
        Permission::create(['name' => 'permission.update', 'group' => 'permission', 'created_at' => now()]);
        Permission::create(['name' => 'permission.delete', 'group' => 'permission', 'created_at' => now()]);

        Permission::create(['name' => 'user.index', 'group' => 'user', 'created_at' => now()]);
        Permission::create(['name' => 'user.create', 'group' => 'user', 'created_at' => now()]);
        Permission::create(['name' => 'user.update', 'group' => 'user', 'created_at' => now()]);
        Permission::create(['name' => 'user.delete', 'group' => 'user', 'created_at' => now()]);
        Permission::create(['name' => 'user.reset-password', 'group' => 'user', 'created_at' => now()]);

        Permission::create(['name' => 'myconfig.index', 'group' => 'config', 'created_at' => now()]);
        Permission::create(['name' => 'myconfig.create', 'group' => 'config', 'created_at' => now()]);
        Permission::create(['name' => 'myconfig.clear-cache', 'group' => 'config', 'created_at' => now()]);
        Permission::create(['name' => 'apilog', 'group' => 'config', 'created_at' => now()]);
        Permission::create(['name' => 'activitylog', 'group' => 'config', 'created_at' => now()]);

        Permission::create(['name' => 'translation.index', 'group' => 'translation', 'created_at' => now()]);
        Permission::create(['name' => 'translation.create', 'group' => 'translation', 'created_at' => now()]);
        Permission::create(['name' => 'translation.update', 'group' => 'translation', 'created_at' => now()]);
        Permission::create(['name' => 'translation.delete', 'group' => 'translation', 'created_at' => now()]);

        Permission::create(['name' => 'menu.index', 'group' => 'menu', 'created_at' => now()]);
        Permission::create(['name' => 'menu.create', 'group' => 'menu', 'created_at' => now()]);
        Permission::create(['name' => 'menu.update', 'group' => 'menu', 'created_at' => now()]);
        Permission::create(['name' => 'menu.delete', 'group' => 'menu', 'created_at' => now()]);

    }
}
