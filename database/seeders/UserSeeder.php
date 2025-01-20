<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Faker;
use Str;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'surname' => 'Adminow',
                'email' => 'admin@admin.com',
                'mobile' => '+993' . rand(61000000, 65999999),
                'password' => Hash::make('0MPY7.UlHnXfpnG7tPWR@k%j[PYAj7jc@-a_ENES=$s7[UBuMwCv4fhd%qDWwxiPuL[{t3_tmt_ift_2025'),
                'role_id' => 1,
                'created_at' => now(),
            ]


        ]);

    }
}
