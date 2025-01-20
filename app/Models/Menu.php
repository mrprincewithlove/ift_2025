<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'description'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'description'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'description', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new Menu)->getTable()) : static::$selectable;
    }

    public function rolemenus()
    {
        return $this->hasMany(RoleMenu::class);
    }
}
