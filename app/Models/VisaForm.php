<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class VisaForm extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'birth_date', 'country', 'address', 'passport', 'date_issue', 'date_expiry', 'education', 'education_institute', 'specialization', 'purpose', 'arrival_date', 'departure_date', 'website', 'hotel', 'photo', 'passport_copy', 'employment_verification_letter'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'birth_date', 'country', 'address', 'passport', 'date_issue', 'date_expiry', 'education', 'education_institute', 'specialization', 'purpose', 'arrival_date', 'departure_date', 'website', 'hotel', 'photo', 'passport_copy', 'employment_verification_letter'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'surname', 'middle_name', 'company_name', 'job', 'email', 'birth_date', 'country', 'address', 'passport', 'date_issue', 'date_expiry', 'education', 'education_institute', 'specialization', 'purpose', 'arrival_date', 'departure_date', 'website', 'hotel', 'photo', 'passport_copy', 'employment_verification_letter', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new VisaForm)->getTable()) : static::$selectable;
    }
}
