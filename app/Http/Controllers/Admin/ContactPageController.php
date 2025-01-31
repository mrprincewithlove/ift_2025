<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactPageRequest;
use App\Http\Requests\UpdateContactPageRequest;
use App\Models\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new ContactPage;
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
        $page = [ 'Contact_page', 'Pages', 'Contact', ];

        $r = $this->hasPermission('contact_page.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(ContactPage::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.contact_page.index', compact(['page']))
                ->with('contactPages', $row)
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
        $page = [ 'Contact_page', 'Pages', 'Contact', ];

        $r = $this->hasPermission('contact_page.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new ContactPage();

        return view('admin.contact_page.create', compact(['page']))->with('contactPage', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPageRequest $request)
    {
        return back();
        $r = $this->hasPermission('contact_page.create', auth()->user()->role_id);
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
        $contactPage = ContactPage::create($data);


        if($contactPage->save())
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
    public function show(ContactPage $contactPage)
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
        $page = [ 'Contact_page', 'Pages', 'Contact', ];

        $r = $this->hasPermission('contact_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $contactPage = ContactPage::find(1);
        return view('admin.contact_page.edit', compact(['page']))->with('contactPage', $contactPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactPageRequest $request)
    {
        $r = $this->hasPermission('contact_page.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        $contactPage = ContactPage::find(1);
        if ( $request->hasFile('main_background_image') )
        {
            // delete old image when update new one
            if ($contactPage->main_background_image && File::exists(public_path($contactPage->main_background_image))) {
                File::delete(public_path($contactPage->main_background_image));
            }

            $image = $this->storeImage($request->main_background_image);

        }
        else{
            $image = $contactPage->main_background_image;
        }
        $data = $request->validated();
        $data['main_background_image'] = $image;
        $contactPage->update($data);

        if($contactPage->save())
        {
            return redirect()->route('contact-page.edit')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ContactPage $contactPage)
    {
        return back();
        $r = $this->hasPermission('contact_page.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($contactPage->delete()){
            if ($contactPage->main_background_image && File::exists(public_path($contactPage->main_background_image))) {
                File::delete(public_path($contactPage->main_background_image));
            }
            return redirect()->route('numbers.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $path = 'ift/images/contact-page';
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
