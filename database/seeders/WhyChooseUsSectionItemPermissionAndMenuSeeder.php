<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class WhyChooseUsSectionItemPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'why_choose_us_section_item.index', 'group' => 'why_choose_us_section_item', 'created_at' => now()]);
        Permission::create(['name' => 'why_choose_us_section_item.create', 'group' => 'why_choose_us_section_item', 'created_at' => now()]);
        Permission::create(['name' => 'why_choose_us_section_item.update', 'group' => 'why_choose_us_section_item', 'created_at' => now()]);
        Permission::create(['name' => 'why_choose_us_section_item.delete', 'group' => 'why_choose_us_section_item', 'created_at' => now()]);

        Menu::create(['name' => 'Index', 'created_at' => now()]);
        Menu::create(['name' => 'WhyChooseUsSection_items', 'created_at' => now()]);
    }
}
