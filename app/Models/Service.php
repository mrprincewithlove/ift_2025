<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Service extends Model
{
    use HasFactory, LogsActivity;



    protected $fillable = ['name', 'form'];

    public static $selectable = ['id', 'name', 'form', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Service)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'form'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }


}
