<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::get(['id']);
        $roles = Role::active()->get(['id']);

        foreach($permissions as $permission)
        {
                \DB::table('role_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $permission->id
                ]);
            \DB::table('role_permissions')->insert([
                'role_id' => 2,
                'permission_id' => $permission->id
            ]);
            \DB::table('role_permissions')->insert([
                'role_id' => 3,
                'permission_id' => $permission->id
            ]);

        }
    }
}
