<?php

namespace App\Http\Controllers;

use App\Models\MyConfig;
use Illuminate\Http\Request;

class MyConfigController extends Controller
{
    public function index()
    {
        $r = $this->hasPermission('myconfig.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $menu = [ 'Configs', 'MyConfig' ];
        $myconfigs = MyConfig::all();
        return view('admin.myconfig.index', compact('menu'))->with('myconfigs', $myconfigs)->with('from', 'db');
    }

    public function restore()
    {
        $r = $this->hasPermission('myconfig.create', auth()->user()->role_id); 
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        return view('admin.myconfig.index')->with('myconfigs', config('custom'))->with('from', 'file');
    }

    public function store(Request $request)
    {
        $r = $this->hasPermission('myconfig.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        foreach($request->all() as $key=>$value)
        {
            if(!($key == '_token' || preg_match('/_description/', $key)))
                MyConfig::updateOrCreate(['key' => $key], ['value' => $value, 'description' => $request->input($key.'_description')]);
        }

        MyConfig::reCache();
        return redirect()->route('myconfigs.index')->with('success', 'My config updated successfully');
    }

    public function clearCache()
    {
        $r = $this->hasPermission('myconfig.clear-cache', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        \Artisan::call('cache:all');

        return back();
    } 
}