<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Visa extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'surname', 'name',  'middle_name',  'born_date',  'born_place',  'citizen',  'passport_number',  'passport_date',  'education',  'coming_text',  'visa_date',  'hotel',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['surname', 'name',  'middle_name',  'born_date',  'born_place',  'citizen',  'passport_number',  'passport_date',  'education',  'coming_text',  'visa_date',  'hotel'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'surname', 'name',  'middle_name',  'born_date',  'born_place',  'citizen',  'passport_number',  'passport_date',  'education',  'coming_text',  'visa_date',  'hotel', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new Visa)->getTable()) : static::$selectable;
    }

}
