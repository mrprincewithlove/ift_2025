<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaPageRequest;
use App\Http\Requests\UpdateMediaPageRequest;
use App\Models\MediaPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class MediaPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new MediaPage;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('main_breadcrumb_title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_tm', 'LIKE', '%'. $str . '%')
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
        return back();
        $page = [ 'Media_page', 'Pages', 'Media', ];

        $r = $this->hasPermission('media_page.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(MediaPage::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.media_page.index', compact(['page']))
                ->with('mediaPages', $row)
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
        $page = [ 'Media_page', 'Pages', 'Media', ];

        $r = $this->hasPermission('media_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new MediaPage();

        return view('admin.media_page.create', compact(['page']))->with('mediaPage', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaPageRequest $request)
    {
        return back();
        $r = $this->hasPermission('media_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('main_background_image') ) {
            $image = $this->storeImage($request->main_background_image);
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
        $data['main_background_image'] = $image;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $mediaPage = MediaPage::create($data);


        if($mediaPage->save())
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
    public function show(MediaPage $mediaPage)
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
        $page = [ 'Media_page', 'Pages', 'Media', ];

        $r = $this->hasPermission('media_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $mediaPage = MediaPage::find(1);
        return view('admin.media_page.edit', compact(['page']))->with('mediaPage', $mediaPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaPageRequest $request)
    {
        $r = $this->hasPermission('media_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $mediaPage = MediaPage::find(1);
        if ( $request->hasFile('main_background_image') )
        {
            // delete old image when update new one
            if ($mediaPage->main_background_image && File::exists(public_path($mediaPage->main_background_image))) {
                File::delete(public_path($mediaPage->main_background_image));
            }

            $image = $this->storeImage($request->main_background_image);

        }
        else{
            $image = $mediaPage->main_background_image;
        }
        if ( $request->hasFile('file_tm') ) {
            if ($mediaPage->file_tm && File::exists(public_path($mediaPage->file_tm))) {
                File::delete(public_path($mediaPage->file_tm));
            }
            $file_tm = $this->storeFile($request->file_tm);
        }
        else {
            $file_tm = $mediaPage->file_tm;
        }
        if ( $request->hasFile('file_ru') ) {
            if ($mediaPage->file_ru && File::exists(public_path($mediaPage->file_ru))) {
                File::delete(public_path($mediaPage->file_ru));
            }
            $file_ru = $this->storeFile($request->file_ru);
        }
        else {
            $file_ru = $mediaPage->file_ru;
        }
        if ( $request->hasFile('file_en') ) {
            if ($mediaPage->file_en && File::exists(public_path($mediaPage->file_en))) {
                File::delete(public_path($mediaPage->file_en));
            }
            $file_en = $this->storeFile($request->file_en);
        }
        else {
            $file_en = $mediaPage->file_en;
        }

        $data = $request->validated();
        $data['main_background_image'] = $image;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $mediaPage->update($data);

        if($mediaPage->save())
        {
            return redirect()->route('media-page.edit')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MediaPage $mediaPage)
    {
        return back();
        $r = $this->hasPermission('media_page.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($mediaPage->delete()){
            if ($mediaPage->main_background_image && File::exists(public_path($mediaPage->main_background_image))) {
                File::delete(public_path($mediaPage->main_background_image));
            }
            if ($mediaPage->file_tm && File::exists(public_path($mediaPage->file_tm))) {
                File::delete(public_path($mediaPage->file_tm));
            }
            if ($mediaPage->file_ru && File::exists(public_path($mediaPage->file_ru))) {
                File::delete(public_path($mediaPage->file_ru));
            }
            if ($mediaPage->file_en && File::exists(public_path($mediaPage->file_en))) {
                File::delete(public_path($mediaPage->file_en));
            }
            return redirect()->route('numbers.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }
    private function storeFile($image_name)
    {
        $path = 'ift/images/media-page';
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
        $path = 'ift/images/media-page';
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
