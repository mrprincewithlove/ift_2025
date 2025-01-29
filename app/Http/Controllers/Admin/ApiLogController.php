<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApiLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $page=null)
    {
        $r = $this->hasPermission('apilog', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $menu = [ 'Configs', 'APILog' ];
        if($page == 'page')
        {
//            $input['log_name'] = ['default', 'specific'];
//            $input['description'] = ['created', 'updated', 'deleted'];
//            $input['subjects'] = ['Permission', 'RemoteUser', 'Role', 'Tariff', 'User'];
//            $input['users'] = User::get(['id', 'name', 'surname']);
            return view('admin.config.apilog', compact('menu'));
//                ->with('input', $input);
        }

//
//        $input['log_name'] = ($request->has('log_name')) ? $request->log_name : [];
//        $input['description'] = ($request->has('description')) ? $request->description: [];
//        $input['subject'] = ($request->has('subject')) ? $request->subject : [];
//        $input['user'] = ($request->has('user')) ? $request->user : [];
        $input['created_at'] = ($request->has('created_at')) ? $request->created_at : '';
        $row = new ApiLogs();

//        if(isset($input['log_name']) && count($input['log_name'])>0)
//            $row = $row->whereIn('log_name', $input['log_name']);
//
//        // $input['description'] = [];
//        if(isset($input['description']) && count($input['description'])>0)
//            $row = $row->whereIn('description', $input['description']);
//
//        // $input['subject'] = [];
//        if(isset($input['subject']) && count($input['subject'])>0)
//            $row = $row->whereIn('subject_type', $input['subject']);
//
//        // $input['user'] = [];
//        if(isset($input['user']) && count($input['user'])>0)
//            $row = $row->whereIn('causer_id', $input['user']);

        if($request->has('created_at') && strlen(trim($request->input('created_at')))>=16)
        {
            $input['created_at'] = preg_replace('/ /', '', $request->input('created_at'));
            $l = explode("-", $input['created_at']);
            $f = Carbon::createFromFormat('d.m.yy', $l[0])->format('Y-m-d') . " 00:00:00";
            $t = Carbon::createFromFormat('d.m.yy', $l[1])->format('Y-m-d') . " 23:59:59";

            if(count($l) > 0 && $l[0]!='null' && $l[1]!=null)
                $row = $row->whereBetween('created_at', [$f, $t]);
        }

        $row = $row->select(ApiLogs::getColumns());

        $row = $row->orderByDesc('id')->paginate(auth()->user()->num_rows)->appends([
//            'log_name' => $input['log_name'],
//            'description' => $input['description'],
//            'subject' => $input['subject'],
//            'user' => $input['user'],
            'created_at' => $input['created_at']
        ]);
        $view = view('admin.config.apilog-table')->with('apilogs', $row)
            ->with('input', $input)
            ->render();

        if($request->ajax())
            return response()->json(['result'=>'success', 'data'=>$view]);
    }

    public function getActivityLogProperty()
    {
        if(request()->ajax())
            if(request()->has('log_id'))
            {
                $activityLog = ApiLogs::find(request()->log_id);
                if($activityLog)
                    return response()->json(['data' => view('admin.config.apilog-column')->with('activityLog', $activityLog)->render()]);
            }

        return response()->json(['data' => '']);
    }
}