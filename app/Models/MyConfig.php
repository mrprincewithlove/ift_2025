<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class MyConfig extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['key', 'value', 'description'];

    private static $selectable = ['id', 'key', 'value', 'description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'group', 'description'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new MyConfig)->getTable()) : static::$selectable;
    }


    public static function reCache()
    {
        cache()->forget('cache_myconfigs');
        cache()->rememberForever('cache_myconfigs', function () {
            return  MyConfig::get(['key', 'value']);
        });

    }
}
