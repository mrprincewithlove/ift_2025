<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new SocialMedia;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('link', 'LIKE', '%'. $str . '%');
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
        $page = [ 'SocialMedia', 'Catalog'];

        $r = $this->hasPermission('socialMedia.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(SocialMedia::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.socialMedia.index', compact(['page']))
                ->with('socialMedias', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'SocialMedia', 'Catalog' ];

        $r = $this->hasPermission('socialMedia.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new SocialMedia();

        return view('admin.socialMedia.create', compact(['page']))->with('socialMedia', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $r = $this->hasPermission('socialMedia.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('icon') ) {
            $image = $this->storeImage($request->icon);
        }
        else {
            $image = null;
        }

        $data = $request->validated();
        $data['icon'] = $image;
        $socialMedia = SocialMedia::create($data);


        if($socialMedia->save())
        {
            return redirect()->route('socialMedias.index')->with('success', 'Created successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Create error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        $page = [ 'Edit', 'SocialMedia', 'Catalog' ];

        $r = $this->hasPermission('socialMedia.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        return view('admin.socialMedia.edit', compact(['page']))->with('socialMedia', $socialMedia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        $r = $this->hasPermission('socialMedia.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('icon') )
        {
            // delete old image when update new one
            if ($socialMedia->icon && File::exists(public_path($socialMedia->icon))) {
                File::delete(public_path($socialMedia->icon));
            }

            $image = $this->storeImage($request->icon);

        }
        else{
            $image = $socialMedia->icon;
        }
        $data = $request->validated();
        $data['icon'] = $image;
        $socialMedia->update($data);

        if($socialMedia->save())
        {
            return redirect()->route('socialMedias.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SocialMedia $socialMedia)
    {
        $r = $this->hasPermission('socialMedia.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($socialMedia->delete()){
            if ($socialMedia->icon && File::exists(public_path($socialMedia->icon))) {
                File::delete(public_path($socialMedia->icon));
            }
            return redirect()->route('socialMedias.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/socialMedia';
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
