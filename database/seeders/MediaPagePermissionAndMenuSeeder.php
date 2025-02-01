<?php

namespace Database\Seeders;

use App\Models\InvestPage;
use App\Models\MediaPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MediaPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MediaPage::create([
            'main_background_image' => 'main_background_image',

            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',

            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',

            'text_tm' => 'text_tm',
            'text_ru' => 'text_ru',
            'text_en' => 'text_en',
        ]);
        Permission::create(['name' => 'media_page.index', 'group' => 'media_page', 'created_at' => now()]);
        Permission::create(['name' => 'media_page.create', 'group' => 'media_page', 'created_at' => now()]);
        Permission::create(['name' => 'media_page.update', 'group' => 'media_page', 'created_at' => now()]);
        Permission::create(['name' => 'media_page.delete', 'group' => 'media_page', 'created_at' => now()]);

        Menu::create(['name' => 'Media', 'created_at' => now()]);
        Menu::create(['name' => 'Media_page', 'created_at' => now()]);
    }
}
