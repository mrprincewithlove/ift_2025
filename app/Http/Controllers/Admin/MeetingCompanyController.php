<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingCompanyRequest;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateMeetingCompanyRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\Label;
use App\Models\MeetingCompany;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class MeetingCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new MeetingCompany;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('link', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('position', 'LIKE', '%'. $str . '%')
                    ->orWhereHas('label', function ($query) use ($str) {
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
        $page = [ 'Meeting_company', 'Pages', 'Meeting',];

        $r = $this->hasPermission('meeting_company.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->with(['label:id,title_tm,title_ru,title_en,color'])->select(MeetingCompany::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.meeting_company.index', compact(['page']))
                ->with('meetingCompanies', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Meeting_company', 'Pages', 'Meeting', ];

        $r = $this->hasPermission('meeting_company.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new MeetingCompany();
        $labels = Label::all();

        return view('admin.meeting_company.create', compact(['page']))->with('meetingCompany', $row)->with('labels', $labels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingCompanyRequest $request)
    {
        $r = $this->hasPermission('meeting_company.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image_tm') ) {
            $image_tm = $this->storeImage($request->image_tm);
        }
        else {
            $image_tm = null;
        }

        if ( $request->hasFile('image_ru') ) {
            $image_ru = $this->storeImage($request->image_ru);
        }
        else {
            $image_ru = null;
        }

        if ( $request->hasFile('image_en') ) {
            $image_en = $this->storeImage($request->image_en);
        }
        else {
            $image_en = null;
        }

        $data = $request->validated();
        $data['image_tm'] = $image_tm;
        $data['image_ru'] = $image_ru;
        $data['image_en'] = $image_en;
        $meetingCompany = MeetingCompany::create($data);


        if($meetingCompany->save())
        {
            return redirect()->route('meeting-companies.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MeetingCompany $meetingCompany)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingCompany $meetingCompany)
    {
        $page = [ 'Meeting_company', 'Pages', 'Meeting',];

        $r = $this->hasPermission('meeting_company.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $labels = Label::all();
        return view('admin.meeting_company.edit', compact(['page']))->with('meetingCompany', $meetingCompany)->with('labels', $labels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingCompanyRequest $request, MeetingCompany $meetingCompany)
    {
        $r = $this->hasPermission('meeting_company.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image_tm') )
        {
            // delete old image when update new one
            if ($meetingCompany->image_tm && File::exists(public_path($meetingCompany->image_tm))) {
                File::delete(public_path($meetingCompany->image_tm));
            }
            $image_tm = $this->storeImage($request->image_tm);
        }
        else{
            $image_tm = $meetingCompany->image_tm;
        }
        if ( $request->hasFile('image_ru') )
        {
            // delete old image when update new one
            if ($meetingCompany->image_ru && File::exists(public_path($meetingCompany->image_ru))) {
                File::delete(public_path($meetingCompany->image_ru));
            }
            $image_ru = $this->storeImage($request->image_ru);
        }
        else{
            $image_ru = $meetingCompany->image_ru;
        }
        if ( $request->hasFile('image_en') )
        {
            // delete old image when update new one
            if ($meetingCompany->image_en && File::exists(public_path($meetingCompany->image_en))) {
                File::delete(public_path($meetingCompany->image_en));
            }
            $image_en = $this->storeImage($request->image_en);
        }
        else{
            $image_en = $meetingCompany->image_en;
        }
        $data = $request->validated();
        $data['image_tm'] = $image_tm;
        $data['image_ru'] = $image_ru;
        $data['image_en'] = $image_en;
        $meetingCompany->update($data);

        if($meetingCompany->save())
        {
            return redirect()->route('meeting-companies.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MeetingCompany $meetingCompany)
    {
        $r = $this->hasPermission('meeting_company.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($meetingCompany->delete()){
            if ($meetingCompany->image_tm && File::exists(public_path($meetingCompany->image_tm))) {
                File::delete(public_path($meetingCompany->image_tm));
            }
            if ($meetingCompany->image_ru && File::exists(public_path($meetingCompany->image_ru))) {
                File::delete(public_path($meetingCompany->image_ru));
            }
            if ($meetingCompany->image_en && File::exists(public_path($meetingCompany->image_en))) {
                File::delete(public_path($meetingCompany->image_en));
            }
            return redirect()->route('meeting-companies.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/meeting-company';
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
            })->save(public_path() . '/' . $image);
        }

        return $image;
    }

}
