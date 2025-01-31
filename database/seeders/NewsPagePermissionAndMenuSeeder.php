<?php

namespace Database\Seeders;

use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class NewsPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'news_page.index', 'group' => 'news_page', 'created_at' => now()]);
        Permission::create(['name' => 'news_page.create', 'group' => 'news_page', 'created_at' => now()]);
        Permission::create(['name' => 'news_page.update', 'group' => 'news_page', 'created_at' => now()]);
        Permission::create(['name' => 'news_page.delete', 'group' => 'news_page', 'created_at' => now()]);

        Menu::create(['name' => 'News', 'created_at' => now()]);
        Menu::create(['name' => 'News_page', 'created_at' => now()]);
    }
}
