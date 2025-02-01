<?php

namespace Database\Seeders;

use App\Models\MeetingPage;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class MeetingCompanyPermissionAndMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'meeting_company.index', 'group' => 'meeting_company', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_company.create', 'group' => 'meeting_company', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_company.update', 'group' => 'meeting_company', 'created_at' => now()]);
        Permission::create(['name' => 'meeting_company.delete', 'group' => 'meeting_company', 'created_at' => now()]);

        Menu::create(['name' => 'Meeting_company', 'created_at' => now()]);
    }
}
