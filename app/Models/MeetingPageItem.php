<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MeetingPageItem extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['image', 'title_tm', 'title_ru', 'title_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en', 'status', 'position', 'updated_by'];

    public static $selectable = ['id','image', 'title_tm', 'title_ru', 'title_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en', 'status', 'position', 'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new MeetingPageItem)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['image', 'title_tm', 'title_ru', 'title_en', 'text_tm', 'text_ru', 'text_en', 'file_tm', 'file_ru', 'file_en', 'status', 'position', 'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
