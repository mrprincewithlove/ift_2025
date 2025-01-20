<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function edit()
    {
        $page = [ 'Information' ];
        $information=Information::first();

        return view('admin.information.update',compact(['information', 'page']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'logofull'            => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            'logosmall'            => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            'text_tm'             => 'max:100',
            'text_ru'             => 'max:100',
            'text_en'             => 'max:100',
            'title_tm'            => 'max:255',
            'title_ru'            => 'max:255',
            'title_en'            => 'max:255',
            'phone1'              => 'max:15',
            'phone2'              => 'max:15',
            'address_tm'          => 'max:255',
            'address_ru'          => 'max:255',
            'address_en'          => 'max:255',
            'email1'              => 'max:100',
            'email2'              => 'max:100',
        ]);

        $information = Information::find(1);
          //dd($information);

        if ( $request->hasFile('logofull') )
        {

            // delete old image when update new one
            if($information && File::exists($information->logofull)) {
                File::delete($information->logofull);
            }
            

            $image = $request->file('logofull');
            $imageFull = 'images/information/' . Str::before($image->getClientOriginalName(), '.' . $image->extension()) . '_' . time().'.webp';

            $img = Image::make($image->path())->encode('webp', 100);
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/' . $imageFull);
        } else {
            $imageFull = ($information) ? $information->logofull : null;
        }

        if ( $request->hasFile('logosmall') )
            {
                // delete old image when update new one
                if($information && File::exists($information->logosmall)) {
                    File::delete($information->logosmall);
                }

                $image = $request->file('logosmall');
                $imageSmall = 'images/information/' . Str::before($image->getClientOriginalName(), '.' . $image->extension()) . '_' . time().'.webp';

                $img = Image::make($image->path())->encode('webp', 100);
                $img->resize(1000, 1000, function ($const) {
                    $const->aspectRatio();
                })->save(public_path() . '/' . $imageSmall);
            } else {
                $imageSmall = ($information) ? $information->logosmall : null;
            }   
            if($information) {
                $information->update([
                    'text_tm'        => $request->text_tm,
                    'text_ru'        => $request->text_ru,
                    'text_en'        => $request->text_en,
        
                    'about_tm'       => $request->about_tm,
                    'about_ru'       => $request->about_ru,
                    'about_en'       => $request->about_en,
        
                    'title_tm'       => $request->title_tm,
                    'title_ru'       => $request->title_ru,
                    'title_en'       => $request->title_en,
        
                    'abouttext2_tm'  => $request->abouttext2_tm,
                    'abouttext2_ru'  => $request->abouttext2_ru,
                    'abouttext2_en'  => $request->abouttext2_en,
        
                    'logofull'       =>  $imageFull,
                    'logosmall'      =>  $imageSmall,
                    'phone1'         =>  $request->phone1,
                    'phone2'         =>  $request->phone2,
                    'address_tm'     =>  $request->address_tm,
                    'address_ru'     =>  $request->address_ru,
                    'address_en'     =>  $request->address_en,
                    'email1'         =>  $request->email1,
                    'email2'         =>  ($request->email2) ? $request->email2 : null,
        
                ]);
            } else {
                Information::create([
                    'text_tm'        => $request->text_tm,
                    'text_ru'        => $request->text_ru,
                    'text_en'        => $request->text_en,
        
                    'about_tm'       => $request->about_tm,
                    'about_ru'       => $request->about_ru,
                    'about_en'       => $request->about_en,
        
                    'title_tm'       => $request->title_tm,
                    'title_ru'       => $request->title_ru,
                    'title_en'       => $request->title_en,
        
                    'abouttext2_tm'  => $request->abouttext2_tm,
                    'abouttext2_ru'  => $request->abouttext2_ru,
                    'abouttext2_en'  => $request->abouttext2_en,
        
                    'logofull'       =>  $imageFull,
                    'logosmall'      =>  $imageSmall,
                    'phone1'         =>  $request->phone1,
                    'phone2'         =>  $request->phone2,
                    'address_tm'     =>  $request->address_tm,
                    'address_ru'     =>  $request->address_ru,
                    'address_en'     =>  $request->address_en,
                    'email1'         =>  $request->email1,
                    'email2'         =>  ($request->email2) ? $request->email2 : null,
        
                ]);
            }
        



         return to_route('informations.edit')->withSuccess(__('information.updated_successfully'));

    }

}
