<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class InvestPage extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['main_background_image','main_breadcrumb_title_tm','main_breadcrumb_title_ru','main_breadcrumb_title_en','title_tm','title_ru','title_en',
        'image', 'name_tm', 'name_ru', 'name_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en', 'updated_by'];

    public static $selectable = ['id','main_background_image','main_breadcrumb_title_tm','main_breadcrumb_title_ru','main_breadcrumb_title_en','title_tm','title_ru','title_en',
        'image', 'name_tm', 'name_ru', 'name_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en', 'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new InvestPage)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['main_background_image','main_breadcrumb_title_tm','main_breadcrumb_title_ru','main_breadcrumb_title_en','title_tm','title_ru','title_en',
                'image', 'name_tm', 'name_ru', 'name_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en',  'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
