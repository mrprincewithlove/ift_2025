<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingCompanyRequest;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\StoreSponsorCompanyRequest;
use App\Http\Requests\UpdateMeetingCompanyRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Http\Requests\UpdateSponsorCompanyRequest;
use App\Models\Label;
use App\Models\MeetingCompany;
use App\Models\SocialMedia;
use App\Models\SponsorCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class SponsorCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new SponsorCompany;
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

    public function index(Request $request)
    {
        $page = [ 'Sponsor_company', 'Pages', 'Sponsor',];

        $r = $this->hasPermission('sponsor_company.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->with(['label:id,title_tm,title_ru,title_en,color'])->select(SponsorCompany::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.sponsor_company.index', compact(['page']))
                ->with('sponsorCompanies', $row)
                ->with('input', $input);
    }


    public function create()
    {
        $page = [ 'Sponsor_company', 'Pages', 'Sponsor', ];

        $r = $this->hasPermission('sponsor_company.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new SponsorCompany();
        $labels = Label::all();

        return view('admin.sponsor_company.create', compact(['page']))->with('sponsorCompany', $row)->with('labels', $labels);
    }

    public function store(StoreSponsorCompanyRequest $request)
    {
        $r = $this->hasPermission('sponsor_company.create', auth()->user()->role_id);
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
        $sponsorCompany = SponsorCompany::create($data);


        if($sponsorCompany->save())
        {
            return redirect()->route('sponsor-companies.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }


    public function show(SponsorCompany $sponsorCompany)
    {
        return back();
    }


    public function edit(SponsorCompany $sponsorCompany)
    {
        $page = [ 'Sponsor_company', 'Pages', 'Sponsor',];

        $r = $this->hasPermission('sponsor_company.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $labels = Label::all();
        return view('admin.sponsor_company.edit', compact(['page']))->with('sponsorCompany', $sponsorCompany)->with('labels', $labels);
    }

    public function update(UpdateSponsorCompanyRequest $request, SponsorCompany $sponsorCompany)
    {
        $r = $this->hasPermission('sponsor_company.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image_tm') )
        {
            // delete old image when update new one
            if ($sponsorCompany->image_tm && File::exists(public_path($sponsorCompany->image_tm))) {
                File::delete(public_path($sponsorCompany->image_tm));
            }
            $image_tm = $this->storeImage($request->image_tm);
        }
        else{
            $image_tm = $sponsorCompany->image_tm;
        }
        if ( $request->hasFile('image_ru') )
        {
            // delete old image when update new one
            if ($sponsorCompany->image_ru && File::exists(public_path($sponsorCompany->image_ru))) {
                File::delete(public_path($sponsorCompany->image_ru));
            }
            $image_ru = $this->storeImage($request->image_ru);
        }
        else{
            $image_ru = $sponsorCompany->image_ru;
        }
        if ( $request->hasFile('image_en') )
        {
            // delete old image when update new one
            if ($sponsorCompany->image_en && File::exists(public_path($sponsorCompany->image_en))) {
                File::delete(public_path($sponsorCompany->image_en));
            }
            $image_en = $this->storeImage($request->image_en);
        }
        else{
            $image_en = $sponsorCompany->image_en;
        }
        $data = $request->validated();
        $data['image_tm'] = $image_tm;
        $data['image_ru'] = $image_ru;
        $data['image_en'] = $image_en;
        $sponsorCompany->update($data);

        if($sponsorCompany->save())
        {
            return redirect()->route('sponsor-companies.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    public function destroy(Request $request, SponsorCompany $sponsorCompany)
    {
        $r = $this->hasPermission('sponsor_company.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($sponsorCompany->delete()){
            if ($sponsorCompany->image_tm && File::exists(public_path($sponsorCompany->image_tm))) {
                File::delete(public_path($sponsorCompany->image_tm));
            }
            if ($sponsorCompany->image_ru && File::exists(public_path($sponsorCompany->image_ru))) {
                File::delete(public_path($sponsorCompany->image_ru));
            }
            if ($sponsorCompany->image_en && File::exists(public_path($sponsorCompany->image_en))) {
                File::delete(public_path($sponsorCompany->image_en));
            }
            return redirect()->route('sponsor-companies.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/sponsor-company';
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
