<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::all();
        return view('check')->with('services', $services);
    }

    public function service(Service $service)
    {
        return view('service')->with('service', $service);
    }

    public function form1(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
        dd($request->all());

    }
    public function form2(Request $request)
    {
        dd($request->all());

    }

}
