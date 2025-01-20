<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Str;

class Role extends Model
{
    use HasFactory, LogsActivity;

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->uuid = (string) Str::uuid();
        });
    }


    protected $fillable = ['name', 'description'];

    public static $selectable = ['id', 'uuid', 'name', 'description', 'archive', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Role)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'description'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public function rolepermissions()
    {
        return $this->hasMany(RolePermission::class);
    }
    public function rolemenus()
    {
        return $this->hasMany(RoleMenu::class);
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_menus');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('archive', 0);
    }
}
