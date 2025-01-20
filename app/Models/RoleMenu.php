<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $fillable = ['role_id', 'menu_id'];

    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Permission::class, 'menu_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
