<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SocialMedia extends Model
{
    use HasFactory, LogsActivity;



    protected $fillable = ['icon', 'link', 'status', 'position'];

    public static $selectable = ['id', 'icon', 'link', 'status', 'position', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new SocialMedia)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['icon', 'link', 'status', 'position'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
