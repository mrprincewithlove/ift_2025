<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(['name' => 'home', 'created_at' => now()]);
        Menu::create(['name' => 'settings', 'created_at' => now()]);
        Menu::create(['name' => 'users', 'created_at' => now()]);
        Menu::create(['name' => 'roles', 'created_at' => now()]);
        Menu::create(['name' => 'permissions', 'created_at' => now()]);
        Menu::create(['name' => 'menus', 'created_at' => now()]);
        Menu::create(['name' => 'translations', 'created_at' => now()]);
        Menu::create(['name' => 'myconfig', 'created_at' => now()]);
        Menu::create(['name' => 'activity-log', 'created_at' => now()]);
        Menu::create(['name' => 'api-log', 'created_at' => now()]);


    }
}
