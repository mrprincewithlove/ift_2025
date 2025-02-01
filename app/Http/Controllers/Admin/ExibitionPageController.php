<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExibitionPageRequest;
use App\Http\Requests\StoreInvestPageRequest;
use App\Http\Requests\UpdateExibitionPageRequest;
use App\Http\Requests\UpdateInvestPageRequest;
use App\Models\ExibitionPage;
use App\Models\InvestPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class ExibitionPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new ExibitionPage;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('main_breadcrumb_title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('main_breadcrumb_title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('title_en', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('name_en', 'LIKE', '%'. $str . '%')
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
        $page = [ 'Exibition_page', 'Pages', 'Exibition', ];

        $r = $this->hasPermission('exibition_page.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(ExibitionPage::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.exibition_page.index', compact(['page']))
                ->with('exibitionPages', $row)
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
        $page = [ 'Exibition_page', 'Pages', 'Exibition', ];

        $r = $this->hasPermission('exibition_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new ExibitionPage();

        return view('admin.exibition_page.create', compact(['page']))->with('exibitionPage', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExibitionPageRequest $request)
    {
        return back();
        $r = $this->hasPermission('exibition_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('main_background_image') ) {
            $image = $this->storeImage($request->main_background_image);
        }
        else {
            $image = null;
        }
        if ( $request->hasFile('image') ) {
            $image_name = $this->storeImage($request->image);
        }
        else {
            $image_name = null;
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
        $data['image'] = $image_name;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $exibitionPage = ExibitionPage::create($data);


        if($exibitionPage->save())
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
    public function show(ExibitionPage $exibitionPage)
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
        $page = [ 'Exibition_page', 'Pages', 'Exibition', ];

        $r = $this->hasPermission('exibition_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $exibitionPage = ExibitionPage::find(1);
        return view('admin.exibition_page.edit', compact(['page']))->with('exibitionPage', $exibitionPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExibitionPageRequest $request)
    {
        $r = $this->hasPermission('exibition_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $exibitionPage = ExibitionPage::find(1);
        if ( $request->hasFile('main_background_image') )
        {
            // delete old image when update new one
            if ($exibitionPage->main_background_image && File::exists(public_path($exibitionPage->main_background_image))) {
                File::delete(public_path($exibitionPage->main_background_image));
            }

            $image = $this->storeImage($request->main_background_image);

        }
        else{
            $image = $exibitionPage->main_background_image;
        }
        if ( $request->hasFile('image') )
        {
            // delete old image when update new one
            if ($exibitionPage->image && File::exists(public_path($exibitionPage->image))) {
                File::delete(public_path($exibitionPage->image));
            }

            $image_name = $this->storeImage($request->image);

        }
        else{
            $image_name = $exibitionPage->image;
        }
        if ( $request->hasFile('file_tm') ) {
            if ($exibitionPage->file_tm && File::exists(public_path($exibitionPage->file_tm))) {
                File::delete(public_path($exibitionPage->file_tm));
            }
            $file_tm = $this->storeFile($request->file_tm);
        }
        else {
            $file_tm = $exibitionPage->file_tm;
        }
        if ( $request->hasFile('file_ru') ) {
            if ($exibitionPage->file_ru && File::exists(public_path($exibitionPage->file_ru))) {
                File::delete(public_path($exibitionPage->file_ru));
            }
            $file_ru = $this->storeFile($request->file_ru);
        }
        else {
            $file_ru = $exibitionPage->file_ru;
        }
        if ( $request->hasFile('file_en') ) {
            if ($exibitionPage->file_en && File::exists(public_path($exibitionPage->file_en))) {
                File::delete(public_path($exibitionPage->file_en));
            }
            $file_en = $this->storeFile($request->file_en);
        }
        else {
            $file_en = $exibitionPage->file_en;
        }

        $data = $request->validated();
        $data['main_background_image'] = $image;
        $data['image'] = $image_name;
        $data['file_tm'] = $file_tm;
        $data['file_ru'] = $file_ru;
        $data['file_en'] = $file_en;
        $exibitionPage->update($data);

        if($exibitionPage->save())
        {
            return redirect()->route('exibition-page.edit')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ExibitionPage $exibitionPage)
    {
        return back();
        $r = $this->hasPermission('exibition_page.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($exibitionPage->delete()){
            if ($exibitionPage->main_background_image && File::exists(public_path($exibitionPage->main_background_image))) {
                File::delete(public_path($exibitionPage->main_background_image));
            }
            if ($exibitionPage->image && File::exists(public_path($exibitionPage->image))) {
                File::delete(public_path($exibitionPage->image));
            }
            if ($exibitionPage->file_tm && File::exists(public_path($exibitionPage->file_tm))) {
                File::delete(public_path($exibitionPage->file_tm));
            }
            if ($exibitionPage->file_ru && File::exists(public_path($exibitionPage->file_ru))) {
                File::delete(public_path($exibitionPage->file_ru));
            }
            if ($exibitionPage->file_en && File::exists(public_path($exibitionPage->file_en))) {
                File::delete(public_path($exibitionPage->file_en));
            }
            return redirect()->route('numbers.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }
    private function storeFile($image_name)
    {
        $path = 'ift/images/exibition-page';
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
        $path = 'ift/images/exibition-page';
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
