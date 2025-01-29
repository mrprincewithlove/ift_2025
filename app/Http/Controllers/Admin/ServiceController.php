<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    private function search($str)
    {
        $a = new Service;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('name', 'LIKE', '%'. $str . '%')
                ->orWhere('form', 'LIKE', '%'. $str . '%');
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
        $page = [ 'Service'];

        $r = $this->hasPermission('service.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        
        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Service::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.service.index', compact(['page']))
                ->with('services', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'Service'];

        $r = $this->hasPermission('service.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new Service;

        return view('admin.service.create', compact(['page']))->with('service', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $this->hasPermission('service.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $validate = $this->rules();
        
        if($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $row = new Service($validate->valid());
        
        if($row->save())
        {
            return redirect()->route('services.index')->with('success', 'new service inserted');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'service create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $page = [ 'Edit', 'Service'];

        $r = $this->hasPermission('service.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');



        return view('admin.service.edit', compact(['page']))->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $r = $this->hasPermission('service.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
            
        $validate = $this->rules($service->id);

        if($validate->fails())
            return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput();

        $service->update($validate->valid());
        if($service->save())
        {

            return redirect()->route('services.index')->with('success', 'service updated');
        }
        return back()->with('prev-url', $request->input('prev-url'))->withErrors($validate)->withInput()->with('error', 'service updated error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $r = $this->hasPermission('service.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($service->delete())
        {

            return redirect()->route('services.index')->with('success', 'service deleted');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'error occured while deleting');
    }
    private function rules($id=null)
    {
        return Validator::make(request()->all(), [
            'name' => 'required|string',
            'form' => 'required|in:form1,form2',
        ]);
    }
}