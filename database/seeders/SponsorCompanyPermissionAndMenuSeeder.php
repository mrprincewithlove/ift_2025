<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class SponsorCompanyPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'sponsor_company.index', 'group' => 'sponsor_company', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_company.create', 'group' => 'sponsor_company', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_company.update', 'group' => 'sponsor_company', 'created_at' => now()]);
        Permission::create(['name' => 'sponsor_company.delete', 'group' => 'sponsor_company', 'created_at' => now()]);

        Menu::create(['name' => 'Sponsor_company', 'created_at' => now()]);
    }
}
