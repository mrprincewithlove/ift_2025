<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Label extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['title_tm','title_ru','title_en', 'color',  'updated_by'];

    public static $selectable = ['id','title_tm','title_ru','title_en', 'color',  'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Label)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['title_tm','title_ru','title_en', 'color',  'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public function meeting_companies()
    {
        return $this->hasMany(MeetingCompany::class)->orderBy('id', 'DESC');

    }
    public function sponsor_companies()
    {
        return $this->hasMany(SponsorCompany::class)->orderBy('id', 'DESC');

    }
    public function index_partners()
    {
        return $this->hasMany(IndexPartner::class)->orderBy('id', 'DESC');

    }
}
