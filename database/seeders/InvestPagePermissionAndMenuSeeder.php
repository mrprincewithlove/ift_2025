<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\InvestPage;
use App\Models\InvestProjectPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class InvestPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvestPage::create([
            'main_background_image' => 'main_background_image',
            'image' => 'image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',

            'name_tm' => 'name_tm',
            'name_ru' => 'name_ru',
            'name_en' => 'name_en',

            'text_tm' => 'text_tm',
            'text_ru' => 'text_ru',
            'text_en' => 'text_en',
        ]);
        Permission::create(['name' => 'invest_page.index', 'group' => 'invest_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_page.create', 'group' => 'invest_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_page.update', 'group' => 'invest_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_page.delete', 'group' => 'invest_page', 'created_at' => now()]);

        Menu::create(['name' => 'Invest', 'created_at' => now()]);
        Menu::create(['name' => 'Invest_page', 'created_at' => now()]);
    }
}
