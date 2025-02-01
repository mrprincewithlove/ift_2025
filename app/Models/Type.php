<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Type extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['title_tm','title_ru','title_en',  'updated_by'];

    public static $selectable = ['id','title_tm','title_ru','title_en', 'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new Type)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['title_tm','title_ru','title_en', 'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
    public function invest_projects()
    {
        return $this->hasMany(InvestProject::class)->orderBy('id', 'DESC');

    }

}
