<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class RegistrationForm extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'surname', 'middle_name', 'company_name', 'job', 'country', 'number', 'emergency_number', 'email', 'website', 'status', 'visa'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'surname', 'middle_name', 'company_name', 'job', 'country', 'number', 'emergency_number', 'email', 'website', 'status', 'visa'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'surname', 'middle_name', 'company_name', 'job', 'country', 'number', 'emergency_number', 'email', 'website', 'status', 'visa', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new RegistrationForm)->getTable()) : static::$selectable;
    }
}
