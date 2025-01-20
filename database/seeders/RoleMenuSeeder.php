<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::get(['id']);
        $roles = Role::active()->get(['id']);

        foreach($menus as $menu)
        {
                \DB::table('role_menus')->insert([
                    'role_id' => 1,
                    'menu_id' => $menu->id
                ]);
            \DB::table('role_menus')->insert([
                'role_id' => 2,
                'menu_id' => $menu->id
            ]);
            \DB::table('role_menus')->insert([
                'role_id' => 3,
                'menu_id' => $menu->id
            ]);

        }
    }
}
