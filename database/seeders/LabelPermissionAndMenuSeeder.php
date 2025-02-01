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

class LabelPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'label.index', 'group' => 'label', 'created_at' => now()]);
        Permission::create(['name' => 'label.create', 'group' => 'label', 'created_at' => now()]);
        Permission::create(['name' => 'label.update', 'group' => 'label', 'created_at' => now()]);
        Permission::create(['name' => 'label.delete', 'group' => 'label', 'created_at' => now()]);

        Menu::create(['name' => 'Label', 'created_at' => now()]);
    }
}
