<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class IndexPartnerPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'index_partner.index', 'group' => 'index_partner', 'created_at' => now()]);
        Permission::create(['name' => 'index_partner.create', 'group' => 'index_partner', 'created_at' => now()]);
        Permission::create(['name' => 'index_partner.update', 'group' => 'index_partner', 'created_at' => now()]);
        Permission::create(['name' => 'index_partner.delete', 'group' => 'index_partner', 'created_at' => now()]);

        Menu::create(['name' => 'Index_partner', 'created_at' => now()]);
    }
}
