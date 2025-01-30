<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MeetingPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MeetingPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
            'list_section_title_tm' => 'list_section_title_tm',
            'list_section_title_ru' => 'list_section_title_ru',
            'list_section_title_en' => 'list_section_title_en',
        ]);
        Permission::create(['name' => 'meeting_page.index', 'group' => 'meeting_page', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page.create', 'group' => 'meeting_page', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page.update', 'group' => 'meeting_page', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_page.delete', 'group' => 'meeting_page', 'created_at' => now()]);

        Menu::create(['name' => 'Pages', 'created_at' => now()]);
        Menu::create(['name' => 'Meeting', 'created_at' => now()]);
        Menu::create(['name' => 'Meeting_page', 'created_at' => now()]);
    }
}
