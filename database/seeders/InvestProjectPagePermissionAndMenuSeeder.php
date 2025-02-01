<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\InvestProjectPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class InvestProjectPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvestProjectPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'invest_project_page.index', 'group' => 'invest_project_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_page.create', 'group' => 'invest_project_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_page.update', 'group' => 'invest_project_page', 'created_at' => now()]);
        Permission::create(['name' => 'invest_project_page.delete', 'group' => 'invest_project_page', 'created_at' => now()]);

        Menu::create(['name' => 'InvestProjects', 'created_at' => now()]);
        Menu::create(['name' => 'InvestProjects_page', 'created_at' => now()]);
    }
}
