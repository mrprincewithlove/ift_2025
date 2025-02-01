<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\SpeakerPage;
use App\Models\SponsorPage;
use Illuminate\Database\Seeder;

class SpeakerPagePermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpeakerPage::create([
            'main_background_image' => 'main_background_image',
            'main_breadcrumb_title_tm' => 'main_breadcrumb_title_tm',
            'main_breadcrumb_title_ru' => 'main_breadcrumb_title_ru',
            'main_breadcrumb_title_en' => 'main_breadcrumb_title_en',
            'title_tm' => 'title_tm',
            'title_ru' => 'title_ru',
            'title_en' => 'title_en',
            'text_tm'   => 'text_tm',
            'text_ru'   => 'text_ru',
            'text_en'   => 'text_en',
        ]);
        Permission::create(['name' => 'speaker_page.index', 'group' => 'speaker_page', 'created_at' => now()]);
        Permission::create(['name' => 'speaker_page.create', 'group' => 'speaker_page', 'created_at' => now()]);
        Permission::create(['name' => 'speaker_page.update', 'group' => 'speaker_page', 'created_at' => now()]);
        Permission::create(['name' => 'speaker_page.delete', 'group' => 'speaker_page', 'created_at' => now()]);

        Menu::create(['name' => 'Speaker', 'created_at' => now()]);
        Menu::create(['name' => 'Speaker_page', 'created_at' => now()]);
    }
}
