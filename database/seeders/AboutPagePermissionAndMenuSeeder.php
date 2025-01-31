<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class AboutPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'about_page.index', 'group' => 'about_page', 'created_at' => now()]);
        Permission::create(['name' => 'about_page.create', 'group' => 'about_page', 'created_at' => now()]);
        Permission::create(['name' => 'about_page.update', 'group' => 'about_page', 'created_at' => now()]);
        Permission::create(['name' => 'about_page.delete', 'group' => 'about_page', 'created_at' => now()]);

        Menu::create(['name' => 'About', 'created_at' => now()]);
        Menu::create(['name' => 'About_page', 'created_at' => now()]);
    }
}
