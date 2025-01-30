<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingPageItemRequest;
use App\Http\Requests\StoreMeetingPageRequest;
use App\Http\Requests\UpdateMeetingPageItemRequest;
use App\Http\Requests\UpdateMeetingPageRequest;
use App\Models\MeetingPage;
use App\Models\MeetingPageItem;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class MeetingPageItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new MeetingPageItem;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('text_en', 'LIKE', '%'. $str . '%');
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
        $page = [ 'Meeting_items', 'Pages', 'Meeting', ];

        $r = $this->hasPermission('meeting_page_item.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(MeetingPageItem::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.meeting_page_item.index', compact(['page']))
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
        $page = [ 'Meeting_items', 'Pages', 'Meeting', ];

        $r = $this->hasPermission('meeting_page_item.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new MeetingPageItem();

        return view('admin.meeting_page_item.create', compact(['page']))->with('meeting_page_item', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingPageItemRequest $request)
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
        $meetingPageItem = MeetingPageItem::create($data);


        if($meetingPageItem->save())
        {
            return redirect()->route('meeting-page-items.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MeetingPageItem $meeting_page_item)
    {
        $page = [ 'Meeting_items', 'Pages', 'Meeting', ];

        $r = $this->hasPermission('meeting_page_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        return view('admin.meeting_page_item.edit', compact(['page']))->with('meeting_page_item', $meeting_page_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingPageItemRequest $request, MeetingPageItem $meeting_page_item)
    {
        $r = $this->hasPermission('meeting_page_item.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        if ( $request->hasFile('image') )
        {
            // delete old image when update new one
            if ($meeting_page_item->image && File::exists(public_path($meeting_page_item->image))) {
                File::delete(public_path($meeting_page_item->image));
            }
            $image = $this->storeImage($request->image);
        }
        else{
            $image = $meeting_page_item->image;
        }
        if ( $request->hasFile('file_tm') ) {
            if ($meeting_page_item->file_tm && File::exists(public_path($meeting_page_item->file_tm))) {
                File::delete(public_path($meeting_page_item->file_tm));
            }
            $file_tm = $this->storeFile($request->file_tm);
        }
        else {
            $file_tm = null;
        }
        if ( $request->hasFile('file_ru') ) {
            if ($meeting_page_item->file_ru && File::exists(public_path($meeting_page_item->file_ru))) {
                File::delete(public_path($meeting_page_item->file_ru));
            }
            $file_ru = $this->storeFile($request->file_ru);
        }
        else {
            $file_ru = null;
        }
        if ( $request->hasFile('file_en') ) {
            if ($meeting_page_item->file_en && File::exists(public_path($meeting_page_item->file_en))) {
                File::delete(public_path($meeting_page_item->file_en));
            }
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
        $meeting_page_item->update($data);

        if($meeting_page_item->save())
        {
            return redirect()->route('meeting-page-items.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MeetingPageItem $meeting_page_item)
    {
        $r = $this->hasPermission('meeting_page_item.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($meeting_page_item->delete()){
            if ($meeting_page_item->image && File::exists(public_path($meeting_page_item->image))) {
                File::delete(public_path($meeting_page_item->image));
            }
            if ($meeting_page_item->file_tm && File::exists(public_path($meeting_page_item->file_tm))) {
                File::delete(public_path($meeting_page_item->file_tm));
            }
            if ($meeting_page_item->file_ru && File::exists(public_path($meeting_page_item->file_ru))) {
                File::delete(public_path($meeting_page_item->file_ru));
            }
            if ($meeting_page_item->file_en && File::exists(public_path($meeting_page_item->file_en))) {
                File::delete(public_path($meeting_page_item->file_en));
            }
            return redirect()->route('meeting-page-items.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }
    private function storeFile($image_name)
    {
        $path = 'ift/images/meeting-page-item';
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
        $path = 'ift/images/meeting-page-item';
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
