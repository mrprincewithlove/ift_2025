<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndexPartnerRequest;
use App\Http\Requests\StoreMeetingCompanyRequest;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateIndexPartnerRequest;
use App\Http\Requests\UpdateMeetingCompanyRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\IndexPartner;
use App\Models\Label;
use App\Models\MeetingCompany;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class IndexPartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new IndexPartner;
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
        $page = [ 'Index_partner', 'Pages', 'Index',];

        $r = $this->hasPermission('index_partner.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->with(['label:id,title_tm,title_ru,title_en,color'])->select(IndexPartner::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.index_partner.index', compact(['page']))
                ->with('indexPartners', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Index_partner', 'Pages', 'Index', ];

        $r = $this->hasPermission('index_partner.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new IndexPartner();
        $labels = Label::all();

        return view('admin.index_partner.create', compact(['page']))->with('indexPartner', $row)->with('labels', $labels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndexPartnerRequest $request)
    {
        $r = $this->hasPermission('index_partner.create', auth()->user()->role_id);
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
        $indexPartner = IndexPartner::create($data);


        if($indexPartner->save())
        {
            return redirect()->route('index-partners.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IndexPartner $indexPartner)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IndexPartner $indexPartner)
    {
        $page = [ 'Index_partner', 'Pages', 'Index',];

        $r = $this->hasPermission('index_partner.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $labels = Label::all();
        return view('admin.index_partner.edit', compact(['page']))->with('indexPartner', $indexPartner)->with('labels', $labels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndexPartnerRequest $request, IndexPartner $indexPartner)
    {
        $r = $this->hasPermission('index_partner.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image_tm') )
        {
            // delete old image when update new one
            if ($indexPartner->image_tm && File::exists(public_path($indexPartner->image_tm))) {
                File::delete(public_path($indexPartner->image_tm));
            }
            $image_tm = $this->storeImage($request->image_tm);
        }
        else{
            $image_tm = $indexPartner->image_tm;
        }
        if ( $request->hasFile('image_ru') )
        {
            // delete old image when update new one
            if ($indexPartner->image_ru && File::exists(public_path($indexPartner->image_ru))) {
                File::delete(public_path($indexPartner->image_ru));
            }
            $image_ru = $this->storeImage($request->image_ru);
        }
        else{
            $image_ru = $indexPartner->image_ru;
        }
        if ( $request->hasFile('image_en') )
        {
            // delete old image when update new one
            if ($indexPartner->image_en && File::exists(public_path($indexPartner->image_en))) {
                File::delete(public_path($indexPartner->image_en));
            }
            $image_en = $this->storeImage($request->image_en);
        }
        else{
            $image_en = $indexPartner->image_en;
        }
        $data = $request->validated();
        $data['image_tm'] = $image_tm;
        $data['image_ru'] = $image_ru;
        $data['image_en'] = $image_en;
        $indexPartner->update($data);

        if($indexPartner->save())
        {
            return redirect()->route('index-partners.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, IndexPartner $indexPartner)
    {
        $r = $this->hasPermission('index_partner.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($indexPartner->delete()){
            if ($indexPartner->image_tm && File::exists(public_path($indexPartner->image_tm))) {
                File::delete(public_path($indexPartner->image_tm));
            }
            if ($indexPartner->image_ru && File::exists(public_path($indexPartner->image_ru))) {
                File::delete(public_path($indexPartner->image_ru));
            }
            if ($indexPartner->image_en && File::exists(public_path($indexPartner->image_en))) {
                File::delete(public_path($indexPartner->image_en));
            }
            return redirect()->route('index-partners.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/index-partner';
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
