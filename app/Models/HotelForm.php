<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class HotelForm extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'number', 'passport', 'hotel', 'in_date', 'out_date'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'number', 'passport', 'hotel', 'in_date', 'out_date'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'number', 'passport', 'hotel', 'in_date', 'out_date', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new HotelForm)->getTable()) : static::$selectable;
    }
}
