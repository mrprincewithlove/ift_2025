<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MeetingPageItemPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'meeting_page_item.index', 'group' => 'meeting_page_item', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page_item.create', 'group' => 'meeting_page_item', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page_item.update', 'group' => 'meeting_page_item', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page_item.delete', 'group' => 'meeting_page_item', 'created_at' => now()]);

        Menu::create(['name' => 'Meeting_items', 'created_at' => now()]);
    }
}
