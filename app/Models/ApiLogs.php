<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ApiLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'request_method', 'request_url', 'request_headers', 'request_body', 'response_status', 'response_headers', 'response_body', 'user_type', 'user_id',
    ];

    private static $selectable = ['id', 'type', 'request_method', 'request_url', 'request_headers', 'request_body', 'response_status', 'response_headers', 'response_body', 'user_type', 'user_id', 'created_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new ApiLogs)->getTable()) : static::$selectable;
    }

    public function getCreatedAtAttribute($value)
    {
        return ($value == null) ? '' : Carbon::parse($value)->format('d-m-Y H:i:s');
    }

}
