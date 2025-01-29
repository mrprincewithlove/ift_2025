<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Validator;

class NumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    
    private function search($str)
    {
        $a = new Number;
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('title_tm', 'LIKE', '%'. $str . '%')
                    ->where('title_ru', 'LIKE', '%'. $str . '%')
                    ->where('title_en', 'LIKE', '%'. $str . '%')
                    ->where('number', 'LIKE', '%'. $str . '%');
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
        $page = [ 'Number', 'Catalog'];

        $r = $this->hasPermission('number.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');
        
        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Number::getColumns());

        $row = $row->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.number.index', compact(['page']))
                ->with('numbers', $row)
                ->with('input', $input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [ 'Create', 'Number', 'Catalog' ];

        $r = $this->hasPermission('number.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new Number();

        return view('admin.number.create', compact(['page']))->with('number', $row);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNumberRequest $request)
    {
        $r = $this->hasPermission('number.create', auth()->user()->role_id);
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
        $number = Number::create($data);


        if($number->save())
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
    public function edit(Number $number)
    {
        $page = [ 'Edit', 'Number', 'Catalog' ];

        $r = $this->hasPermission('number.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        return view('admin.number.edit', compact(['page']))->with('number', $number);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberRequest $request, Number $number)
    {
        $r = $this->hasPermission('number.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if ( $request->hasFile('icon') )
        {
            // delete old image when update new one
            if ($number->icon && File::exists(public_path($number->icon))) {
                File::delete(public_path($number->icon));
            }

            $image = $this->storeImage($request->icon);

        }
        else{
            $image = $number->icon;
        }
        $data = $request->validated();
        $data['icon'] = $image;
        $number->update($data);

        if($number->save())
        {
            return redirect()->route('numbers.index')->with('success', 'Updated successfully');
        }
        return back()->with('prev-url', $request->input('prev-url'))->with('error', 'Update error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Number $number)
    {
        $r = $this->hasPermission('number.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        if($number->delete()){
            if ($number->icon && File::exists(public_path($number->icon))) {
                File::delete(public_path($number->icon));
            }
            return redirect()->route('numbers.index')->withSuccess(__('translates.deleted_successfully'));
        }

        return back()->with('error', __('translates.delete_error'));
    }

    private function storeImage($image_name)
    {
        $directoryPath = public_path('ift/images/number');

        // Check if the directory exists and create it if it does not
        if (!File::exists($directoryPath))
        {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if ($image_name->extension() == 'svg') {
        // Store SVG as it is
            $image = $directoryPath.'/' . Str::slug(Str::before($image_name->getClientOriginalName(), '.' . $image_name->extension())) . '_' . time() . '.svg';
            $image_name->move(public_path($directoryPath), $image);
        }
        else{

            $image = $directoryPath.'/' . Str::before(Str::replace(' ', '_', $image_name->getClientOriginalName()), '.' . $image_name->extension()) . '_' . time() . '.webp';
            $img = Image::make($image_name->path())->encode('webp', 100);
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/' . $image);
        }

        return $image;
    }

}