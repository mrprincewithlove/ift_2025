<?php

namespace Database\Seeders;

use App\Models\ContactPage;
use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\NewsPage;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class ContactPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
        ]);
        Permission::create(['name' => 'contact_page.index', 'group' => 'contact_page', 'created_at' => now()]);
        Permission::create(['name' => 'contact_page.create', 'group' => 'contact_page', 'created_at' => now()]);
        Permission::create(['name' => 'contact_page.update', 'group' => 'contact_page', 'created_at' => now()]);
        Permission::create(['name' => 'contact_page.delete', 'group' => 'contact_page', 'created_at' => now()]);

        Menu::create(['name' => 'Contact', 'created_at' => now()]);
        Menu::create(['name' => 'Contact_page', 'created_at' => now()]);
    }
}
