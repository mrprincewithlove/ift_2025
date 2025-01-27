<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FlightForm extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'emergency_number', 'arrival_date', 'departure_date', 'ticket'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'emergency_number', 'arrival_date', 'departure_date', 'ticket'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'emergency_number', 'arrival_date', 'departure_date', 'ticket', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new FlightForm)->getTable()) : static::$selectable;
    }
}
