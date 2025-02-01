<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\InvestProjectPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class InvestProjectPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'invest_project_item.index', 'group' => 'invest_project_item', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_item.create', 'group' => 'invest_project_item', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_item.update', 'group' => 'invest_project_item', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_item.delete', 'group' => 'invest_project_item', 'created_at' => now()]);

        Menu::create(['name' => 'InvestProjects_item', 'created_at' => now()]);
    }
}
