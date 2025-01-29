<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $model = new Menu;
        if (strlen(trim($str)) > 0) {
            $model = $model->where(function ($query) use ($str) {
                $query->where('name', 'LIKE', '%' . $str . '%')
                    ->orWhere('description', 'LIKE', '%' . $str . '%');
            });
        }
        return $model;
    }


    public function index(Request $request)
    {
        $page = ['Menu', 'Configs'];

        $r = $this->hasPermission('menu.index', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Menu::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        if ($request->ajax()) {
            return response()->json($row->map(function ($item, $key) {
                return $item->only(['id', 'name']);
            }));
        }
        return view('admin.menu.index', compact(['page']))
            ->with('menus', $row)
            ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'Menu', 'Configs'];

        $r = $this->hasPermission('menu.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $menu = new Menu;


        return view('admin.menu.create', compact('page'))->with('menu', $menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $r = $this->hasPermission('menu.create', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $validate = $this->rules();
        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();


        $menu = new Menu($validate->valid());

        if ($menu->save())
            return redirect()->route('menus.index')->with('success', 'Menu created');



        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Menu create error');
    }


    public function show($id)
    {
        return back();
    }



    public function edit(Menu $menu)
    {
        $page = [ 'Edit', 'Menu', 'Configs'];

        $r = $this->hasPermission('menu.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');



        return view('admin.menu.edit', compact(['page']))->with('menu', $menu);
    }


    public function update(Request $request, Menu $menu)
    {
        $r = $this->hasPermission('menu.update', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $validate = $this->rules($menu->id);

        if ($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $menu->update($validate->valid());

        if ($menu->save())
            return redirect()->route('menus.index')->with('success', 'Menu updated');

        return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput()->with('error', 'Menu updated error');
    }


    public function destroy(Request $request, Menu $menu)
    {
        $r = $this->hasPermission('menu.delete', auth()->user()->role_id);
        if (!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        try {
            $menu->rolemenus()->delete();
            if ($menu->delete())
                return redirect()->route('menus.index')->with('success', 'Menu deleted');
        } catch (\Throwable $th) {
            throw $th;
        }

        return back()->with('error', 'error occured while deleting');
    }


    private function rules($id = null)
    {

        return Validator::make(request()->all(), [
            'name' => ['required', \Illuminate\Validation\Rule::unique('menus', 'name')->ignore($id)],
            'description' => 'nullable | max:255',
        ]);
    }
}
