<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Fetch all centers associated with the user
        $permissions = $user->role->permissions;
        $menus = $user->role->menus;

        // Extract the permission names
        $permissionNames = $permissions->pluck('name')->toArray();
        $menuNames = $menus->pluck('name')->toArray();
        // Store the permission names in the session
        Session::put('user_permissions', $permissionNames);
        Session::put('user_menus', $menuNames);

        // Store centers in session

        // Set the main center as the active center


        // Optionally, you can handle additional logic here

        return redirect()->intended($this->redirectPath());
    }
}
