<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgendaPageRequest;
use App\Http\Requests\StoreGalleryPageRequest;
use App\Http\Requests\StoreMeetingPageRequest;
use App\Http\Requests\UpdateAgendaPageRequest;
use App\Http\Requests\UpdateGalleryPageRequest;
use App\Http\Requests\UpdateMeetingPageRequest;
use App\Models\AgendaPage;
use App\Models\GalleryPage;
use App\Models\MeetingPage;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class AgendaPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new AgendaPage;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('main_breadcrumb_title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_tm', 'LIKE', '%'. $str . '%')
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
        return back();
        $page = [ 'Agenda_page', 'Pages', 'Agenda', ];

        $r = $this->hasPermission('agenda_page.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(AgendaPage::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.agenda_page.index', compact(['page']))
                ->with('agendaPages', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
        $page = [ 'Agenda_page', 'Pages', 'Agenda', ];

        $r = $this->hasPermission('agenda_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new AgendaPage();

        return view('admin.agenda_page.create', compact(['page']))->with('agendaPage', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgendaPageRequest $request)
    {
        return back();
        $r = $this->hasPermission('agenda_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('main_background_image') ) {
            $image = $this->storeImage($request->main_background_image);
        }
        else {
            $image = null;
        }

        $data = $request->validated();
        $data['main_background_image'] = $image;
        $agendaPage = AgendaPage::create($data);


        if($agendaPage->save())
        {
            return redirect()->route('numbers.index')->with('success', 'Created successfully');
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
    public function edit()
    {
        $page = [ 'Agenda_page', 'Pages', 'Agenda', ];

        $r = $this->hasPermission('agenda_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $agendaPage = AgendaPage::find(1);
        return view('admin.agenda_page.edit', compact(['page']))->with('agendaPage', $agendaPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgendaPageRequest $request)
    {
        $r = $this->hasPermission('agenda_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $agendaPage = AgendaPage::find(1);
        if ( $request->hasFile('main_background_image') )
        {
            // delete old image when update new one
            if ($agendaPage->main_background_image && File::exists(public_path($agendaPage->main_background_image))) {
                File::delete(public_path($agendaPage->main_background_image));
            }

            $image = $this->storeImage($request->main_background_image);

        }
        else{
            $image = $agendaPage->main_background_image;
        }
        $data = $request->validated();
        $data['main_background_image'] = $image;
        $agendaPage->update($data);

        if($agendaPage->save())
        {
            return redirect()->route('agenda-page.edit')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AgendaPage $agendaPage)
    {
        return back();
        $r = $this->hasPermission('agenda_page.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($agendaPage->delete()){
            if ($agendaPage->main_background_image && File::exists(public_path($agendaPage->main_background_image))) {
                File::delete(public_path($agendaPage->main_background_image));
            }
            return redirect()->route('numbers.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/agenda-page';
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
