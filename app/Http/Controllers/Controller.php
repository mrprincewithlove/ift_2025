<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function hasPermission($permission, $role_id)
    {
        $result = RolePermission::whereHas('permission', function($q) use($permission){
            $q->where('name', $permission);
        })
            // ->with('permission:id,name')
            ->where('role_id', $role_id)
            ->get();

        if($result && count($result)==1)
            return true;

        return false;
    }
}
