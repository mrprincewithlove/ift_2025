<?php

namespace Database\Seeders;

use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\PressPage;
use Illuminate\Database\Seeder;

class PressPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PressPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'press_page.index', 'group' => 'press_page', 'created_at' => now()]);
        Permission::create(['name' => 'press_page.create', 'group' => 'press_page', 'created_at' => now()]);
        Permission::create(['name' => 'press_page.update', 'group' => 'press_page', 'created_at' => now()]);
        Permission::create(['name' => 'press_page.delete', 'group' => 'press_page', 'created_at' => now()]);

        Menu::create(['name' => 'Press', 'created_at' => now()]);
        Menu::create(['name' => 'Press_page', 'created_at' => now()]);
    }
}
