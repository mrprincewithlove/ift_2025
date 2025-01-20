<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [  
        'text_tm',
        'text_ru',  
        'text_en',  
        'about_tm',
        'about_ru',  
        'about_en',  
        'title_tm',
        'title_ru', 
        'title_en', 
        'abouttext2_tm',
        'abouttext2_ru',
        'abouttext2_en',
        'logofull',
        'logosmall',
        'image_en',
        'phone1',
        'phone2',
        'address_tm',
        'address_ru',
        'address_en',
        'email1',
        'email2',
    ];

}
