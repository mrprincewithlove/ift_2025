<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Translation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [ 'key', 'file', 'value_tm', 'value_ru', 'value_en'];

    public static $selectable = ['id', 'key', 'file',  'value_tm', 'value_ru', 'value_en', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Translation)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly([ 'key', 'file', 'value_tm', 'value_ru', 'value_en'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
