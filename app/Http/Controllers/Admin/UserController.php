<?php

namespace App\Http\Controllers\Admin;

use App\Models\Center;
use App\Models\CenterUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Validator;
//use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    /**
     * private filter function
     * @return Users model
     */
    private function search($str)
    {
        $a = new User;
        if (strlen(trim($str)) > 0) {
            $a = $a->where(function ($query) use ($str) {
                $query->orWhere('name', 'LIKE', '%' . $str . '%')
                    ->orWhere('surname', 'LIKE', '%' . $str . '%')
                    ->orWhere('father_name', 'LIKE', '%' . $str . '%')
                    ->orWhere('mobile', 'LIKE', '%' . $str . '%')
                    ->orWhere('email', 'LIKE', '%' . $str . '%')
                    ->orWhereHas('role', function ($query) use ($str) {
                        $query->where('name', 'LIKE', '%' . $str . '%');
                    });
            });
        }
        return $a;
    }


    public function index(Request $request)
    {
        $page = [ 'Configs', 'Users' ];
        $r = $this->hasPermission('user.index', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        // $input = ['show_archive' => ($request->input('show_archive') === 'yes') ? 'yes' : 'no'];
        // $row = ($input['show_archive'] == 'no') ? $row->where('archive', 0) : $row->where('archive', 1);
//        $row = $row->whereNot('role_id', 6)->whereNot('role_id', 7);
        $row = $row->with('role:id,name')->select(User::getColumns())->orderBy('id', 'DESC');


        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
            // 'show_archive' => $input['show_archive'] ?? '',
        ]);

        if ($request->ajax()) {
            return response()->json($row->map(function ($item) {
                return $item->only(['uuid', 'name', 'surname']);
            }));
        }

        return view('admin.user.index', compact(['page']))
            ->with('users', $row)
            ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'User', 'Configs' ];

        $r = $this->hasPermission('user.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $user = new User;
        $roles = Role::where('archive', 0)->get(['id', 'name']);

        return view('admin.user.create', compact(['page']))->with('user', $user)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $this->hasPermission('user.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $validate = $this->rulesStore();

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();
//        aman@gmail.com
//        12345A!a

//        if (!Helper::verifyPasswordPattern($request->input('password')))
//            return back()->with('error', __('password-pattern'));
        if ($request->hasFile('image')) {
            // Get logo If It Exists

            $avatar = $request->file('image');

            $extension = $avatar->getClientOriginalExtension();

            if ($extension == 'gif') {
                $avatar_name = 'images/profiles/' . Str::before($avatar->getClientOriginalName(), '.' . $avatar->extension()) . '_' . time() . '.gif';
                $img = Image::make($avatar->path())->encode('webp', 100);
                $img->move(public_path() . '/' . $avatar_name);
            } else {
                $avatar_name = 'images/profiles/' . Str::before($avatar->getClientOriginalName(), '.' . $avatar->extension()) . '_' . time() . '.webp';
                $img = Image::make($avatar->path())->encode('webp', 100);
                $img->resize(300, 300, function ($const) {
                    $const->aspectRatio();
                })->save(public_path() . '/' . $avatar_name);
            }
        } else {
            $avatar_name = null;
        }

        $user = new User($validate->valid());
        $user->image = $avatar_name;
        $user->password = Hash::make($request->input('password'));

        if ($user->save()){
            return back()->with('prev-url', $request->input('prev-url'))->with('success', 'user created');
        }



        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'user create error');
    }

    public function changeRole(Request $request, User $user, Role $role)
    {
        // $r = $this->getPermission('update', $this->tbl);
        // if($r !== 1)
        //     return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $user->role_id = $role->id;
        $user->save();
        return back()->with('prev-url', $request->input('prev-url'))->with('success', 'user created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $page = [ 'Edit', 'Configs', 'User' ];

        $r = $this->hasPermission('user.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ($user->archive == 1 || ($user->id == 1 && auth()->user()->id != 1))
            return back();



        $roles = Role::where('archive', 0)->get(['id', 'name']);

        return view('admin.user.edit', compact(['page']))->with('user', $user)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        //$page = [ 'Update', 'User', 'Config' ];

        $r = $this->hasPermission('user.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $validate = $this->rulesUpdate($user->id);

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();


        if ($user->id == 1 && auth()->user()->id != 1)
            return back()->with('prev-url', $request->input('prev-url'))->with('error', 'admin user can not be updated');
        //save avatar, if it is given 


        if ($request->hasFile('image')) {
            // Get logo If It Exists

            $avatar = $request->file('image');

            $extension = $avatar->getClientOriginalExtension();
            
            if ($extension == 'gif') {
                $avatar_name = 'images/profiles/' . Str::before($avatar->getClientOriginalName(), '.' . $avatar->extension()) . '_' . time() . '.gif';
                $img = Image::make($avatar->path())->encode('webp', 100);
                $img->move(public_path() . '/' . $avatar_name);
            } else {
                $avatar_name = 'images/profiles/' . Str::before($avatar->getClientOriginalName(), '.' . $avatar->extension()) . '_' . time() . '.webp';
                $img = Image::make($avatar->path())->encode('webp', 100);
                $img->resize(300, 300, function ($const) {
                    $const->aspectRatio();
                })->save(public_path() . '/' . $avatar_name);
            }
        } else {
            $avatar_name = $user->image;
        }

        $user->update($validate->valid());
        $user->image = $avatar_name;
        if ($user->save())
        {
            return redirect()->route('users.index')->with('success', 'user updated');
        }


        return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput()->with('error', 'user updated error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $r = $this->hasPermission('user.delete', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ($user->id == 1 || $user->archive == 1)
            return back()->with('error', 'already archived');

        $user->archive = 1;
        $user->login = $user->login . '__' . now()->format('d-m-Y');
        $user->mobile = $user->mobile . '__' . now()->format('d-m-Y');
        $user->email = $user->email . '__' . now()->format('d-m-Y');
        $user->password = Hash::make(rand(1, 10000) . $user->login . rand(1, 900000));

        if ($user->save()){
            $user->delete();
            return redirect($request->input('prev-url'))->with('success', 'user deleted');

        }

        return back()->with('error', 'error occured while deleting');
    }

    public function getProfile()
    {
        $user = User::findOrFail(auth()->user()->id);
        $languages = config('app.locales');
        return view('admin.user.profile')->with('user', $user)->with('languages', $languages);
    }

    /**
     * reset password of user by admin
     */
    public function changePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'newpassword1' => 'required|min:6',
            'newpassword2' => 'required|min:6',
        ]);

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        if (!Helper::verifyPasswordPattern($request->input('newpassword1')))
            return back()->with('error', __('password_pattern'));

        if ($request->input('newpassword1') != null && $request->input('newpassword1') == $request->input('newpassword2')) {
            $user = User::findOrFail(auth()->user()->id);
            if ($user) {
                if (Hash::check($request->input('oldpassword'), $user->password)) {
                    $user->password = bcrypt($request->input('newpassword1'));

                    if ($user->save())
                        return back()->with('success', 'password updated');
                    else
                        return back()->with('error', 'password update eroor');
                }
                return back()->with('error', 'current password does not match');
            }
        }
        return back()->with('error', 'confirm password does not match');
    }

    public function resetPassword(Request $request, $user)
    {
        $r = $this->hasPermission('user.reset-password', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        $validate = Validator::make($request->all(), [
            'password1' => 'required|min:6',
            'password2' => 'required|min:6',
        ]);


        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate);
        if ($request->input('password1') != null && $request->input('password1') == $request->input('password2')) {
            $u = User::where('id', $user)->first();
            if ($u) {
                $u->password = bcrypt($request->input('password1'));
                if ($u->save())
                    return back()->with('prev-url', $request->input('prev-url'))->with('success', 'password updated');
            }
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'password update error');
    }

    /**
     * authenticated user can change language of own (en, tm, ru)
     */
    public function changeLanguage(Request $request)
    {
        if (in_array($request->input('language'), config('app.locales'))) {
            $user = User::findOrFail(auth()->user()->id);
            $user->language = $request->input('language');
            $user->save();
            $user->refresh();

            \Session::put('locale', $user->language);
            \Session::flash('success', 'language updated');
            return back();
        }
        return back()->with('error', 'language is not available');
    }

    private function rulesStore()
    {
        return Validator::make(request()->all(), [
            'name'          => 'required | max:30',
            'surname'       => 'required | max:30',
            'role_id'       => 'required | numeric | min:1',
            'email'         => 'nullable | max:50',
            'mobile'        => ['required' , 'unique:users,mobile'],
            'birth_date'    => 'nullable',
            'password'      => 'required | min:6',
            'image'         => 'nullable | mimes:jpg,jpeg,png,webp|max:4096',
        ]);
    }

    private function rulesUpdate($id)
    {

        return Validator::make(request()->all(), [
            'name'          => 'required | max:30',
            'surname'       => 'required | max:30',
            'role_id'       => 'required | numeric | min:1',
            'email'         => 'nullable | max:50',
            'mobile'        => ['required', \Illuminate\Validation\Rule::unique('users', 'mobile')->ignore($id)],
            'birth_date'    => 'nullable ',
//            'mobile'        => 'nullable|regex:/' . \Helper::getMobileFormatForVerification() . '/',
            'image'         => 'nullable | mimes:jpg,jpeg,png,webp|max:4096',
            //'avatar'        => 'mimes:jpg,jpeg,png,webp|max:4096',
        ]);
    }
}
