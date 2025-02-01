<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SponsorCompany extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['name_tm', 'name_ru', 'name_en', 'image_tm', 'image_ru', 'image_en', 'link', 'label_id', 'status', 'position', 'updated_by'];

    public static $selectable = ['id','name_tm', 'name_ru', 'name_en', 'image_tm', 'image_ru', 'image_en', 'link', 'label_id', 'status', 'position', 'updated_by', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (isset(static::$selectable) &&  count(static::$selectable) == 0) ? \Schema::getColumnListing((new SponsorCompany)->getTable()) : static::$selectable;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            -> logOnly(['name_tm', 'name_ru', 'name_en', 'image_tm', 'image_ru', 'image_en', 'link', 'label_id', 'status', 'position', 'updated_by'])
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }
}
