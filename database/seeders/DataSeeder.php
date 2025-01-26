<?php

namespace Database\Seeders;

use App\Models\FormCount;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Visa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
//        $perm1 = Permission::create(['name' => 'admin.home', 'group' => 'home', 'created_at' => now()]);
//        $perm1 = Permission::create(['name' => 'service.index', 'group' => 'service', 'created_at' => now()]);
//        $perm2 = Permission::create(['name' => 'service.create', 'group' => 'service', 'created_at' => now()]);
//        $perm3 = Permission::create(['name' => 'service.show', 'group' => 'service', 'created_at' => now()]);
//        $perm4 = Permission::create(['name' => 'service.update', 'group' => 'service', 'created_at' => now()]);
//        $perm5 = Permission::create(['name' => 'service.delete', 'group' => 'service', 'created_at' => now()]);
//        $perm6 = Permission::create(['name' => 'service.receipts', 'group' => 'service', 'created_at' => now()]);
//
//        $perm7 = Permission::create(['name' => 'service_client.index', 'group' => 'service_client', 'created_at' => now()]);
//        $perm8 = Permission::create(['name' => 'service_client.create', 'group' => 'service_client', 'created_at' => now()]);
//        $perm9 = Permission::create(['name' => 'service_client.update', 'group' => 'service_client', 'created_at' => now()]);
//        $perm10 = Permission::create(['name' => 'service_client.delete', 'group' => 'service_client', 'created_at' => now()]);
//
//        $perm11 = Permission::create(['name' => 'receipt.index', 'group' => 'receipt', 'created_at' => now()]);
//        $perm12 = Permission::create(['name' => 'receipt.create', 'group' => 'receipt', 'created_at' => now()]);
//        $perm13 = Permission::create(['name' => 'receipt.update', 'group' => 'receipt', 'created_at' => now()]);
//        $perm14 = Permission::create(['name' => 'receipt.delete', 'group' => 'receipt', 'created_at' => now()]);
//
//
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm1->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm2->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm3->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm4->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm5->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm6->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm7->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm8->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm9->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm10->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm11->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm12->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm13->id]);
//        RolePermission::create(['role_id'=>1, 'permission_id'=> $perm14->id]);

//        $visa = Visa::factory(10000)->create();

        $formCount = FormCount::create([
            'registration'  =>0,
            'flight'        =>0,
            'visa'      =>0,
            'logistic'      =>0,
            'hotel'     =>0,
            'city_tours'        =>0,
            'request_call'      =>0,
            'feedback'      =>0,
            'test'      =>0,
            'another_form'      =>0,
        ]);
    }

}
