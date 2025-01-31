<?php

namespace Database\Seeders;

use App\Models\AgendaPage;
use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class AgendaPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AgendaPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'agenda_page.index', 'group' => 'agenda_page', 'created_at' => now()]);
        Permission::create(['name' => 'agenda_page.create', 'group' => 'agenda_page', 'created_at' => now()]);
        Permission::create(['name' => 'agenda_page.update', 'group' => 'agenda_page', 'created_at' => now()]);
        Permission::create(['name' => 'agenda_page.delete', 'group' => 'agenda_page', 'created_at' => now()]);

        Menu::create(['name' => 'Agenda', 'created_at' => now()]);
        Menu::create(['name' => 'Agenda_page', 'created_at' => now()]);
    }
}
