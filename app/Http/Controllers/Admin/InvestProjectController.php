<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvestProjectPageRequest;
use App\Http\Requests\StoreInvestProjectRequest;
use App\Http\Requests\UpdateInvestProjectRequest;
use App\Http\Requests\UpdateInvestProjeectPageRequest;
use App\Models\InvestProject;
use App\Models\InvestProjectPage;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class InvestProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new InvestProject;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('position', 'LIKE', '%'. $str . '%')
                    ->orWhereHas('type', function ($query) use ($str) {
                        $query->where('title_tm', 'LIKE', '%' . $str . '%')
                            ->orWhere('title_ru', 'LIKE', '%' . $str . '%')
                            ->orWhere('title_en', 'LIKE', '%' . $str . '%');
                    });
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
        $page = [ 'InvestProjects_item', 'Pages', 'InvestProjects', ];

        $r = $this->hasPermission('invest_project_item.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->with(['type:id,title_tm,title_ru,title_en'])->select(InvestProject::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.invest_project_item.index', compact(['page']))
                ->with('items', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'InvestProjects_item', 'Pages', 'InvestProjects', ];

        $r = $this->hasPermission('invest_project_item.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new InvestProject();
        $types = Type::all();

        return view('admin.invest_project_item.create', compact(['page']))->with('investProject', $row)->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestProjectRequest $request)
    {
        $r = $this->hasPermission('invest_project_item.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image') ) {
            $image = $this->storeImage($request->image);
        }
        else {
            $image = null;
        }
        if ( $request->hasFile('file_tm') ) {
            $file_tm = $this->storeFile($request->file_tm);
        }
        else {
            $file_tm = null;
        }
        if ( $request->hasFile('file_ru') ) {
            $file_ru = $this->storeFile($request->file_ru);
        }
        else {
            $file_ru = null;
        }
        if ( $request->hasFile('file_en') ) {
            $file_en = $this->storeFile($request->file_en);
        }
        else {
            $file_en = null;
        }


        $data = $request->validated();
        $data['image'] = $image;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $investProject = InvestProject::create($data);


        if($investProject->save())
        {
            return redirect()->route('invest-projects.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    public function show(InvestProject $investProject)
    {
        return back();
    }


    public function edit(InvestProject $investProject)
    {
        $page = [ 'InvestProjects_item', 'Pages', 'InvestProjects', ];

        $r = $this->hasPermission('invest_project_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $types = Type::all();
        return view('admin.invest_project_item.edit', compact(['page']))->with('investProject', $investProject)->with('types', $types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestProjectRequest $request, InvestProject $investProject)
    {
        $r = $this->hasPermission('invest_project_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        if ( $request->hasFile('image') )
        {
            // delete old image when update new one
            if ($investProject->image && File::exists(public_path($investProject->image))) {
                File::delete(public_path($investProject->image));
            }

            $image = $this->storeImage($request->image);

        }
        else{
            $image = $investProject->image;
        }

        if ( $request->hasFile('file_tm') ) {
            if ($investProject->file_tm && File::exists(public_path($investProject->file_tm))) {
                File::delete(public_path($investProject->file_tm));
            }
            $file_tm = $this->storeFile($request->file_tm);
        }
        else {
            $file_tm = $investProject->file_tm;
        }
        if ( $request->hasFile('file_ru') ) {
            if ($investProject->file_ru && File::exists(public_path($investProject->file_ru))) {
                File::delete(public_path($investProject->file_ru));
            }
            $file_ru = $this->storeFile($request->file_ru);
        }
        else {
            $file_ru = $investProject->file_ru;
        }
        if ( $request->hasFile('file_en') ) {
            if ($investProject->file_en && File::exists(public_path($investProject->file_en))) {
                File::delete(public_path($investProject->file_en));
            }
            $file_en = $this->storeFile($request->file_en);
        }
        else {
            $file_en = $investProject->file_en;
        }

        $data = $request->validated();
        $data['image'] = $image;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $investProject->update($data);

        if($investProject->save())
        {
            return redirect()->route('invest-projects.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InvestProject $investProject)
    {
        $r = $this->hasPermission('invest_project_page.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($investProject->delete()){
            if ($investProject->image && File::exists(public_path($investProject->image))) {
                File::delete(public_path($investProject->image));
            }
            if ($investProject->file_tm && File::exists(public_path($investProject->file_tm))) {
                File::delete(public_path($investProject->file_tm));
            }
            if ($investProject->file_ru && File::exists(public_path($investProject->file_ru))) {
                File::delete(public_path($investProject->file_ru));
            }
            if ($investProject->file_en && File::exists(public_path($investProject->file_en))) {
                File::delete(public_path($investProject->file_en));
            }
            return redirect()->route('invest-projects.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }
    private function storeFile($image_name)
    {
        $path = 'ift/images/invest-project';
        $directoryPath = public_path($path);

        // Check if the directory exists and create it if it does not
        if (!File::exists($directoryPath))
        {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $image = $path.'/' . Str::slug(Str::before($image_name->getClientOriginalName(), '.' . $image_name->extension())) . '_' . time() .'.'. $image_name->extension();
        $image_name->move(public_path($path), $image);

        return $image;
    }
    private function storeImage($image_name)
    {
        $path = 'ift/images/invest-project';
        $directoryPath = public_path($path);

        // Check if the directory exists and create it if it does not
        if (!File::exists($directoryPath))
        {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if ($image_name->extension() == 'svg') {
        // Store SVG as it is
            $image = $path.'/' . Str::slug(Str::before($image_name->getClientOriginalName(), '.' . $image_name->extension())) . '_' . time() . '.svg';
            $image_name->move(public_path($path), $image);
        }
        else{
            $image = $path.'/' . Str::before(Str::replace(' ', '_', $image_name->getClientOriginalName()), '.' . $image_name->extension()) . '_' . time() . '.webp';
            $img = Image::make($image_name->path())->encode('webp', 100);
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save(public_path() .'/' . $image);
        }

        return $image;
    }

}
