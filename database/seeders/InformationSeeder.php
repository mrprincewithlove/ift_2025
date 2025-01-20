<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('information')->insert([

            'logofull'      =>    'images/information/isgarLogo_1687171829.webp',
            'logosmall'     =>    'images/information/isgarLogosmall_1687603652.webp',
            'text_tm'       =>    'Işgär',
            'text_ru'       =>    'Isgar',
            'text_en'       =>    'Isgar',
            'title_tm'      =>    'Herkime iş tapylar',
            'title_ru'      =>    'Работа найдётся каждому',
            'title_en'      =>    'Jobs for everyone',
            'about_tm'      =>    'Bu platforma iş gözleýänler bilen iş berijileri bir ara getirmek maksady bilen gurlandyr',
            'about_ru'      =>    'Bu platforma iş gözleýänler bilen iş berijileri bir ara getirmek maksady bilen gurlandyr',
            'about_en'      =>    'Bu platforma iş gözleýänler bilen iş berijileri bir ara getirmek maksady bilen gurlandyr',
            'phone1'        =>    '+993 64203495',
            'phone2'        =>    '+993 63145533',
            'address_tm'    =>    '744000 Aşgabat, ave 1945 №98',
            'address_ru'    =>    '744000 Aşgabat, ave 1945 №98',
            'address_en'    =>    '744000 Aşgabat, ave 1945 №98',
            'email1'        =>    'info@isgar.com.tm',
            'email2'        =>    'mail@isgar.com.tm',
        ]);
    }
}
