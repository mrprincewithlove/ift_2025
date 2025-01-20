<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'group', 'description'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'group', 'description'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'group', 'description', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new Permission)->getTable()) : static::$selectable;
    }

    public function rolepermissions()
    {
        return $this->hasMany(RolePermission::class);
    }

    public static function getDistinctGroups()
    {
        return Permission::distinct('group')->pluck('group')->toArray();
    }
}
