<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';
    private static $selectable = ['id', 'log_name', 'description', 'subject_type', 'subject_id', 'causer_type', 'causer_id', 'properties', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new ActivityLog)->getTable()) : static::$selectable;
    }

    public function getCreatedAtAttribute($value)
    {
        return ($value == null) ? '' : Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id', 'id');
    }
}