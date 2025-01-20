<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasApiTokens, LogsActivity, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [ 'name', 'surname', 'father_name','email', 'mobile', 'password', 'role_id',
            'image', 'birth_date', 'mobile_verified_at', 'email_verified_at', 'code',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'surname', 'father_name','email', 'mobile', 'password', 'role_id',
                'image', 'birth_date', 'mobile_verified_at', 'email_verified_at', 'code', 'deleted_at',])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static $selectable = ['id', 'name', 'surname', 'father_name','email', 'mobile', 'password', 'role_id',
        'image', 'birth_date', 'mobile_verified_at', 'email_verified_at', 'code', 'deleted_at', 'created_at', 'updated_at'];

    public static function getColumns()
    {
        return (!isset(static::$selectable) || count(static::$selectable) == 0) ? \Schema::getColumnListing((new User)->getTable()) : static::$selectable;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $guard = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getFullName()
    {
        return ucfirst($this->surname) . ' ' . ucfirst($this->name);
    }


    public function getAvatar()
    {
        return $this->image ?? \Helper::getMyConfigCache('default-avatar');
    }


}
