<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Validator;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $model = new Permission;
        if (strlen(trim($str)) > 0) {
            $model = $model->where(function ($query) use ($str) {
                $query->where('name', 'LIKE', '%' . $str . '%')
                    ->orWhere('group', 'LIKE', '%' . $str . '%')
                    ->orWhere('description', 'LIKE', '%' . $str . '%');
            });
        }
        return $model;
    }


    public function index(Request $request)
    {
        $page = ['Permission', 'Configs'];

        $r = $this->hasPermission('permission.index', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error', '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Permission::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        if ($request->ajax()) {
            return response()->json($row->map(function ($item, $key) {
                return $item->only(['id', 'name']);
            }));
        }
        return view('admin.permission.index', compact(['page']))
            ->with('permissions', $row)
            ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'Permission', 'Configs'];

        $r = $this->hasPermission('permission.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $permission = new Permission;
        $groups = Permission::getDistinctGroups();

        return view('admin.permission.create', compact('page'))->with('permission', $permission)->with('groups', $groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $r = $this->hasPermission('permission.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $validate = $this->rules();
        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();


        $permission = new Permission($validate->valid());

        if ($permission->save())
            return redirect()->route('permissions.index')->with('success', 'permission created');



        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'permission create error');
    }

    public function changeRole(Request $request, Permission $permission, Role $role)
    {
        // $r = $this->getPermission('update', $this->tbl);
        // if($r !== 1)
        //     return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $permission->role_id = $role->id;
        $permission->save();
        return back()->with('prev-url', $request->input('prev-url'))->with('success', 'permission created');
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
    public function edit(Permission $permission)
    {
        $page = [ 'Edit', 'Permission', 'Configs'];

        $r = $this->hasPermission('permission.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $groups = Permission::getDistinctGroups();

        return view('admin.permission.edit', compact(['page']))->with('permission', $permission)->with('groups', $groups);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $r = $this->hasPermission('permission.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $validate = $this->rules($permission->id);

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $permission->update($validate->valid());

        if ($permission->save())
            return redirect($request->input('prev-url'))->with('success', 'permission updated');

        return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput()->with('error', 'permission updated error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
        $r = $this->hasPermission('permission.delete', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        try {
            $permission->rolepermissions()->delete();
            if ($permission->delete())
                return back()->with('success', 'permission deleted');
        } catch (\Throwable $th) {
            throw $th;
        }

        return back()->with('error', 'error occured while deleting');
    }

    public function getProfile()
    {
        $u = Permission::findOrFail(auth()->permission()->id);
        return view('permission-role.permission.profile')->with('permission', $u);
    }

    /**
     * reset password of permission by admin
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
            return back()->with('error', __('tr.password_pattern'));

        if ($request->input('newpassword1') != null && $request->input('newpassword1') == $request->input('newpassword2')) {
            $u = Permission::findOrFail(auth()->permission()->id);
            if ($u) {
                if (Hash::check($request->input('oldpassword'), $u->password)) {
                    $u->password = bcrypt($request->input('newpassword1'));

                    if ($u->save())
                        return back()->with('success', 'password updated');
                    else
                        return back()->with('error', 'password update eroor');
                }
            }
        }
        return back()->with('error', 'password update eroor');
    }

    public function resetPassword(Request $request, $id)
    {
        $r = $this->getPermission('update', $this->tbl);
        if ($r !== 1)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error','')->with('permission', 'no permission');

        $validate = Validator::make($request->all(), [
            'newpassword1' => 'required|min:6',
            'newpassword2' => 'required|min:6',
        ]);

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate);

        if ($request->input('newpassword1') != null && $request->input('newpassword1') == $request->input('newpassword2')) {
            $u = Permission::findOrFail($id);
            if ($u) {
                $u->password = bcrypt($request->input('newpassword1'));
                $u->is_blocked = 0;
                $u->wrong_attempt_count = 0;
                if ($request->input('force_password_change') == "yes")
                    $u->password_updated_at = "2000-01-01";

                if ($u->save())
                    return back()->with('prev-url', $request->input('prev-url'))->with('success', 'password updated');
            }
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'password update error');
    }

    /**
     * authenticated permission can change language of own (en, tm, ru)
     */
    public function changeLanguage(Request $request)
    {
        if (in_array($request->input('language'), \Config::get('app.locales'))) {
            $u = Permission::findOrFail(auth()->permission()->id);
            $u->language = $request->input('language');
            $u->save();
            $u->refresh();

            \Session::put('locale', $u->language);
            \Session::flash('success', 'language updated');
            return back();
        }
        return back()->with('error', 'language update error');
    }

    private function rules($id = null)
    {

        return Validator::make(request()->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('permissions', 'name')->ignore($id)],
            'group' => 'nullable',
            'description' => 'nullable | max:255',
        ]);
    }
}
