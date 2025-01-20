<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\RoleMenu;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    private function search($str)
    {
        $a = new Role;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('name', 'LIKE', '%'. $str . '%')
                ->orWhere('description', 'LIKE', '%'. $str . '%');
            });
        }
        return $a;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = [ 'Role', 'Configs' ];

        $r = $this->hasPermission('role.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        
        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->where('archive', 0)->select(Role::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
            'show_archive' => $input['show_archive'] ?? '',
        ]);

        return view('admin.role.index', compact(['page']))
                ->with('roles', $row) 
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'Configs', 'Role' ];

        $r = $this->hasPermission('role.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new Role;

        return view('admin.role.create', compact(['page']))->with('role', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $this->hasPermission('role.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $validate = $this->rules();
        
        if($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $row = new Role($validate->valid());
        
        if($row->save())
        {
            return back()->with('prev-url', $request->input('prev-url'))->with('success', 'new role inserted');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'role create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $page = [ 'Edit', 'Configs', 'Role' ];

        $r = $this->hasPermission('role.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $existing = User::where('role_id', $role->id)->get(['role_id', 'name', 'surname']);

        return view('admin.role.edit', compact(['page']))->with('role', $role)->with('existing', $existing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $r = $this->hasPermission('role.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
            
        $validate = $this->rules($role->id);

        if($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $role->update($validate->valid());
        if($role->save())
        {
            // if($request->has('users') && count($request->input('users')))
            // {
            //     foreach($request->input('users') as $uid)
            //     {
            //         $u = User::findOrFail($uid);
            //         if($u->role_id == 2)
            //         {
            //             $u->role_id = $role->id;
            //             $u->save();
            //         }
            //     }
            // }
            // Permission::reCache();
            return redirect()->route('roles.index')->with('success', 'role updated');
        }
        return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput()->with('error', 'user updated error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Role $role)
    {
        $r = $this->hasPermission('role.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if(User::where('role_id', $role->id)->where('archive', 0)->count()> 0)
            return back()->with('prev-url', $request->input('prev-url'))->with('error', 'active users exist in this group, can not be deleted');

        $role->archive = 1;
        $role->name = $role->name . '__' . now()->format('d-m-Y:H-i-s');
        if($role->save())
        {
            // Permission::removePermissions($role->id);
            // Permission::reCache();
            
            return redirect()->route('roles.index')->with('success', 'group deleted');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'error occured while deleting');
    }

    public function showPermission(Request $request, Role $role)
    {
        $page = [ 'Role', 'Configs' ];
        $r = $this->hasPermission('role.permission-read', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $groups = Permission::getDistinctGroups();
        $permissions = Permission::get(['id', 'name', 'group']);
        $rolepermissions = RolePermission::where('role_id', $role->id)->pluck('permission_id')->toArray();

        return view('admin.role.permission', compact('page'))
                ->with('role', $role)
                ->with('groups', $groups)
                ->with('rolepermissions', $rolepermissions)
                ->with('permissions', $permissions);
    }


    public function updatePermission(Request $request, Role $role)
    {
        $r = $this->hasPermission('role.permission-update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        
        $rolepermissions = RolePermission::where('role_id', $role->id)->pluck('permission_id')->toArray();
        $remove_permissions = array_diff($rolepermissions, $request->input('permissions'));
        $add_permissions = array_diff($request->input('permissions'), $rolepermissions);

        if(count($remove_permissions)>0)
            RolePermission::where('role_id', $role->id)->whereIn('permission_id', $remove_permissions)->delete();

        if(count($add_permissions)>0)
        {
            foreach($add_permissions as $ap)
            {
                $data[] = ['role_id'=>$role->id, 'permission_id'=>$ap];
            }
            RolePermission::insert($data);
        }
        // $role->rolepermissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', 'successfuly updated');
    }
    public function showMenu(Request $request, Role $role)
    {
        $page = [ 'Role', 'Configs' ];
        $r = $this->hasPermission('role.menu-read', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $menus = Menu::get(['id', 'name']);
        $rolemenus = RoleMenu::where('role_id', $role->id)->pluck('menu_id')->toArray();

        return view('admin.role.menu', compact('page'))
            ->with('role', $role)
            ->with('rolemenus', $rolemenus)
            ->with('menus', $menus);
    }


    public function updateMenu(Request $request, Role $role)
    {
        $r = $this->hasPermission('role.menu-update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $rolemenus = RoleMenu::where('role_id', $role->id)->pluck('menu_id')->toArray();
        $remove_menus = array_diff($rolemenus, $request->input('menus'));
        $add_menus = array_diff($request->input('menus'), $rolemenus);

        if(count($remove_menus)>0)
            RoleMenu::where('role_id', $role->id)->whereIn('menu_id', $remove_menus)->delete();

        if(count($add_menus)>0)
        {
            foreach($add_menus as  $add_menu)
            {
                $data[] = ['role_id'=>$role->id, 'menu_id'=>$add_menu];
            }
            RoleMenu::insert($data);
        }
        // $role->rolepermissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', 'successfuly updated');
    }
    private function rules($id=null)
    {
        return Validator::make(request()->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('roles', 'name')->ignore($id)],
            'description' => 'nullable | max:255',
        ]);
    }
}