<?php

namespace Database\Seeders;

use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class GalleryPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GalleryPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'gallery_page.index', 'group' => 'gallery_page', 'created_at' => now()]);
        Permission::create(['name' => 'gallery_page.create', 'group' => 'gallery_page', 'created_at' => now()]);
        Permission::create(['name' => 'gallery_page.update', 'group' => 'gallery_page', 'created_at' => now()]);
        Permission::create(['name' => 'gallery_page.delete', 'group' => 'gallery_page', 'created_at' => now()]);

        Menu::create(['name' => 'Gallery', 'created_at' => now()]);
        Menu::create(['name' => 'Gallery_page', 'created_at' => now()]);
    }
}
