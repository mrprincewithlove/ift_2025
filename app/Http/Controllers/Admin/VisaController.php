<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FormViewExport;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Visa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class VisaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $model = new Visa;
        if (strlen(trim($str)) > 0) {
            $model = $model->where(function ($query) use ($str) {
                $query->where('surname', 'LIKE', '%' . $str . '%')
                    ->orWhere('name', 'LIKE', '%' . $str . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $str . '%')
                    ->orWhere('born_date', 'LIKE', '%' . $str . '%')
                    ->orWhere('born_place', 'LIKE', '%' . $str . '%')
                    ->orWhere('citizen', 'LIKE', '%' . $str . '%')
                    ->orWhere('passport_number', 'LIKE', '%' . $str . '%')
                    ->orWhere('passport_date', 'LIKE', '%' . $str . '%')
                    ->orWhere('education', 'LIKE', '%' . $str . '%')
                    ->orWhere('coming_text', 'LIKE', '%' . $str . '%')
                    ->orWhere('visa_date', 'LIKE', '%' . $str . '%')
                    ->orWhere('hotel', 'LIKE', '%' . $str . '%');
            });
        }
        return $model;
    }


    public function index(Request $request)
    {
        $page = ['Visa'];

        $r = $this->hasPermission('visa.index', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('error', '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Visa::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        if ($request->ajax()) {
            return response()->json($row->map(function ($item, $key) {
                return $item->only(['id', 'name', 'surname', 'middlename']);
            }));
        }
        return view('admin.visa.index', compact(['page']))
            ->with('visas', $row)
            ->with('input', $input);
    }

    public function excell()
    {
        $row = $this->search('');
        $theads = ['№', 'Familiyasy', 'Ady',  'Atasynyn ady',  'Doglan wagty',  'Doglan yeri',  'Rayatlygy',  'Passport belgisi',  'Passport mohleti',  'Bilimi',  'Gelmegin maksady',  'Wizanyn mohleti',  'Yashajak yeri'];
        $selections = ['id', 'surname', 'name',  'middle_name',  'born_date',  'born_place',  'citizen',  'passport_number',  'passport_date',  'education',  'coming_text',  'visa_date',  'hotel'];
        $data = ([$theads, $row->get($selections), 'visa-list']);
        $name = 'visa-list' . '_' . now()->format('d-m-Y') . '.' . 'xlsx';
        return Excel::download(new FormViewExport($data), 'visa.xlsx');
        
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


    private function rules($id = null)
    {

        return Validator::make(request()->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('permissions', 'name')->ignore($id)],
            'group' => 'nullable',
            'description' => 'nullable | max:255',
        ]);
    }
}
