<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Number extends Model
{
    use HasFactory, LogsActivity;



    protected $fillable = ['title_tm', 'title_ru', 'title_en', 'icon', 'number', 'status', 'position', 'updated_by'];

    public static $selectable = ['id','title_tm', 'title_ru', 'title_en', 'icon', 'number', 'status', 'position', 'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Number)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['title_tm', 'title_ru', 'title_en', 'icon', 'number', 'status', 'position', 'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
