<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::whereNotNull('name')->paginate(10);
        return view('index')->with('permissions', $permissions);

    }
}
