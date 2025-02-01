<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\ExibitionPage;
use App\Models\GalleryPage;
use App\Models\InvestPage;
use App\Models\InvestProjectPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class TypePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'type.index', 'group' => 'type', 'created_at' => now()]);
        Permission::create(['name' => 'type.create', 'group' => 'type', 'created_at' => now()]);
        Permission::create(['name' => 'type.update', 'group' => 'type', 'created_at' => now()]);
        Permission::create(['name' => 'type.delete', 'group' => 'type', 'created_at' => now()]);

        Menu::create(['name' => 'Type', 'created_at' => now()]);
    }
}
