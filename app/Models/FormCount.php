<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FormCount extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'registration', 'flight', 'visa', 'logistic', 'hotel', 'city_tours', 'request_call', 'feedback', 'test', 'another_form'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['registration', 'flight', 'visa', 'logistic', 'hotel', 'city_tours', 'request_call', 'feedback', 'test', 'another_form'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'registration', 'flight', 'visa', 'logistic', 'hotel', 'city_tours', 'request_call', 'feedback', 'test', 'another_form', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new FormCount)->getTable()) : static::$selectable;
    }
}
