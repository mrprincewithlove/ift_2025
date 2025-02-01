<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWhyChooseUsSectionItemRequest;
use App\Http\Requests\UpdateWhyChooseUsSectionItemRequest;
use App\Models\WhyChooseUsSectionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class WhyChooseUsSectionItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new WhyChooseUsSectionItem;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_en', 'LIKE', '%'. $str . '%');
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
        $page = [ 'WhyChooseUsSection_items', 'Pages', 'Index', ];

        $r = $this->hasPermission('why_choose_us_section_item.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(WhyChooseUsSectionItem::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);
        return view('admin.why_choose_us_section_item.index', compact(['page']))
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
        $page = [ 'WhyChooseUsSection_items', 'Pages', 'Index', ];

        $r = $this->hasPermission('why_choose_us_section_item.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new WhyChooseUsSectionItem();

        return view('admin.why_choose_us_section_item.create', compact(['page']))->with('why_choose_us_section_item', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhyChooseUsSectionItemRequest $request)
    {
        $r = $this->hasPermission('meeting_page_item.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('image') ) {
            $image = $this->storeImage($request->image);
        }
        else {
            $image = null;
        }

        $data = $request->validated();
        $data['image'] = $image;
        $item = WhyChooseUsSectionItem::create($data);


        if($item->save())
        {
            return redirect()->route('why-choose-us-section-items.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WhyChooseUsSectionItem $why_choose_us_section_item)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WhyChooseUsSectionItem $why_choose_us_section_item)
    {
        $page = [ 'WhyChooseUsSection_items', 'Pages', 'Index', ];

        $r = $this->hasPermission('why_choose_us_section_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        return view('admin.why_choose_us_section_item.edit', compact(['page']))->with('why_choose_us_section_item', $why_choose_us_section_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhyChooseUsSectionItemRequest $request, WhyChooseUsSectionItem $why_choose_us_section_item)
    {
        $r = $this->hasPermission('why_choose_us_section_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        if ( $request->hasFile('image') )
        {
            // delete old image when update new one
            if ($why_choose_us_section_item->image && File::exists(public_path($why_choose_us_section_item->image))) {
                File::delete(public_path($why_choose_us_section_item->image));
            }
            $image = $this->storeImage($request->image);
        }
        else{
            $image = $why_choose_us_section_item->image;
        }

        $data = $request->validated();
        $data['image'] = $image;

        $why_choose_us_section_item->update($data);

        if($why_choose_us_section_item->save())
        {
            return redirect()->route('why-choose-us-section-items.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WhyChooseUsSectionItem $why_choose_us_section_item)
    {
        $r = $this->hasPermission('why_choose_us_section_item.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($why_choose_us_section_item->delete()){
            if ($why_choose_us_section_item->image && File::exists(public_path($why_choose_us_section_item->image))) {
                File::delete(public_path($why_choose_us_section_item->image));
            }
            return redirect()->route('why-choose-us-section-items.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }
    private function storeFile($image_name)
    {
        $path = 'ift/images/why-choose-us-section-item';
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
        $path = 'ift/images/why-choose-us-section-item';
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
