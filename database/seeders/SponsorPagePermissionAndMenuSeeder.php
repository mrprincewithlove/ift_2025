<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\SponsorPage;
use Illuminate\Database\Seeder;

class SponsorPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SponsorPage::create([
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
        Permission::create(['name' => 'sponsor_page.index', 'group' => 'sponsor_page', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_page.create', 'group' => 'sponsor_page', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_page.update', 'group' => 'sponsor_page', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_page.delete', 'group' => 'sponsor_page', 'created_at' => now()]);

        Menu::create(['name' => 'Sponsor', 'created_at' => now()]);
        Menu::create(['name' => 'Sponsor_page', 'created_at' => now()]);
    }
}
