<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Helpers\Helper;

class FrontController extends Controller
{
    //
    private function storeImage($image_name)
    {
        $directoryPath = public_path('images/tif');

        // Check if the directory exists and create it if it does not
        if (!File::exists($directoryPath))
        {
            File::makeDirectory($directoryPath, 0755, true);
        }
        // Check if the directory exists and create it if it does not

        $image = 'images/tif/' . Str::slug(Str::before($image_name->getClientOriginalName(), '.' . $image_name->extension())) . '_' . time() . '.'.$image_name->extension();
        $image_name->move(public_path('images/tif'), $image);

        return $image;
    }
    private function getNextId()
    {
        $filePath = resource_path('local_info/registration.json');

        if (!File::exists($filePath)) {
            return 1;
        }

        $jsonData = File::get($filePath);
        $existingData = json_decode($jsonData, true);

        if (empty($existingData)) {
            return 1;
        }

        $lastId = end($existingData)['id'];
        return $lastId + 1;
    }
    public function index()
    {
        return view('front.includes.index');
        
    }
    public function soon()
    {
        return view('front.includes.coming');

    }

    public function register()
    {
        $countries = \Helper::getCountries();

        return view('front.includes.register')->with('countries', $countries);
//        return view('front.'.app()->currentLocale().'.register')->with('countries', $countries);
    }

    public function register_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'country' => 'required|integer|min:1|max:194',
            'number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/',
            ],
            'emergency_number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/',
            ],
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'status' => [
                'required',
                Rule::in(['Delegate', 'Media', 'Speaker', 'Diplomat', 'Sponsor']),
            ],
            'visa' => [
                'required',
                Rule::in(['yes', 'no']),
            ],
//            'photo' => 'required|image|mimes:jpg,jpeg|max:4096',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
//        $directoryPath = public_path('images/registration');
//        if ( $request->hasFile('photo') ) {
//
//            $image = $this->storeImage($request->file('photo'), $directoryPath);
//
//        } else {
//            $image = null;
//        }


        $data = [
            'id'                => $this->getNextId(),
            'name'              => $request->name,
            'surname'           => $request->surname,
            'middle_name'       => $request->middle_name,
            'company_name'      => $request->company_name,
            'job'               => $request->job,
            'country'           => \Helper::getCountryName($request->country),
            'number'            => $request->number,
            'emergency_number'  => $request->emergency_number,
            'email'             => $request->email,
            'website'           => $request->website,
            'status'            => $request->status,
            'visa'              => $request->visa,
//            'photo'             => $image,
        ];

        $filePath = resource_path('local_info/registration.json');

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode([$data]));
        } else {
            $jsonData = File::get($filePath);
            $existingData = json_decode($jsonData, true);
            $existingData[] = $data;
            File::put($filePath, json_encode($existingData));
        }

        try{

            $to_name = $request->name. ' '. $request->middle_name.' '.$request->surname;

            $to_email = $request->email;

            $user_details = "Thank you for registration";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.register_response1', $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for registration');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            //            log here
            Log::error($th->getMessage());
        }
        try{

            $to_name = 'Hormatly Tif administratory';

//            $to_email = 'ereshjumayew@gmail.com';
            $to_email = 'yusuph0206@gmail.com';

            $title = 'Tif new registration report';
//            $img = $data['photo'];
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
//            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email, $img) {
            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Taze registrasia geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
//                if(isset($img)){
//                $message->attach(public_path('/'.$img));
//                }
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('front.Registration sended successfully!'));

    }

    public function feedback_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/', // Requires a + followed by 6 to 15 digits
            ],
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'name'              => $request->name,
            'surname'           => $request->surname,
            'number'            => $request->number,
            'email'             => $request->email,
            'message'            => $request->message,
        ];

        $filePath = resource_path('local_info/feedback.json');

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode([$data]));
        } else {
            $jsonData = File::get($filePath);
            $existingData = json_decode($jsonData, true);
            $existingData[] = $data;
            File::put($filePath, json_encode($existingData));
        }

        try{

            $to_name = $request->name. ' '.$request->surname;

            $to_email = $request->email;

            $user_details = "Thank you for feedback ";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.feedback_response1', $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for feedback');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            //            log here
            Log::error($th->getMessage());
        }
        try{
            $to_name = 'Hormatly Tif administratory';

//            $to_email = 'ereshjumayew@gmail.com';
            $to_email = 'yusup@ucyap.com';

            $title = 'Tif new feedback report';
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
            Mail::send('mail.feedback_report1', $data2, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Taze feedback geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('front.Feedback sended successfully!'));

    }
}
