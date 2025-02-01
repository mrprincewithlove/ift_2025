<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Label;
use App\Models\Number;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new Type;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('title_tm', 'LIKE', '%'. $str . '%')
                    ->where('title_ru', 'LIKE', '%'. $str . '%')
                    ->where('title_en', 'LIKE', '%'. $str . '%');
            });
        }
        return $a;
    }

    public function index(Request $request)
    {
        $page = [ 'Type', 'Catalog'];

        $r = $this->hasPermission('type.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Type::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.type.index', compact(['page']))
                ->with('types', $row)
                ->with('input', $input);
    }

    public function create()
    {
        $page = [ 'Create', 'Type', 'Catalog' ];

        $r = $this->hasPermission('type.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new Type();

        return view('admin.type.create', compact(['page']))->with('type', $row);
    }


    public function store(StoreTypeRequest $request)
    {
        $r = $this->hasPermission('type.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        $data = $request->validated();

        $type = Type::create($data);


        if($type->save())
        {
            return redirect()->route('types.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    public function show(Type $type)
    {
        return back();
    }


    public function edit(Type $type)
    {
        $page = [ 'Edit', 'Type', 'Catalog' ];

        $r = $this->hasPermission('type.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        return view('admin.type.edit', compact(['page']))->with('type', $type);
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        $r = $this->hasPermission('label.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        $data = $request->validated();

        $type->update($data);

        if($type->save())
        {
            return redirect()->route('types.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    public function destroy(Request $request, Type $type)
    {
//        return back()->with('permission', 'no permission');
        $r = $this->hasPermission('label.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($type->delete()){

            return redirect()->route('types.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

}
