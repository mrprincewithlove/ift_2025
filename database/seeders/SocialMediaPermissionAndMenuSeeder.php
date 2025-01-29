<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class SocialMediaPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'socialMedia.index', 'group' => 'socialMedia', 'created_at' => now()]);
        Permission::create(['name' => 'socialMedia.create', 'group' => 'socialMedia', 'created_at' => now()]);
        Permission::create(['name' => 'socialMedia.update', 'group' => 'socialMedia', 'created_at' => now()]);
        Permission::create(['name' => 'socialMedia.delete', 'group' => 'socialMedia', 'created_at' => now()]);

        Menu::create(['name' => 'socialMedia', 'created_at' => now()]);
    }
}
