<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
    private function storeFiles($image_name, $directory)
    {
        $directoryPath = public_path($directory);

        // Check if the directory exists and create it if it does not
        if (!File::exists($directoryPath))
        {
            File::makeDirectory($directoryPath, 0755, true);
        }
        // Check if the directory exists and create it if it does not

        $image = $directory.'/' . Str::slug(Str::before($image_name->getClientOriginalName(), '.' . $image_name->extension())) . '_' . time() . '.'.$image_name->extension();
        $image_name->move(public_path($directory), $image);

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

    public function visa()
    {
        $hotels = \Helper::getHotels();
        $countries = \Helper::getCountries();
        return view('front.includes.visa')->with('countries', $countries)->with('hotels', $hotels);
    }

    public function register_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'country' => 'required|integer|min:1|max:194',
            'number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/',
            ],
            'emergency_number' => [
                'nullable',
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

//        response mail for register
        try{

            $to_name = $request->name. ' '. $request->middle_name.' '.$request->surname;

            $to_email = $request->email;

            $user_details = "Thank you for registration";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.register_response1_'.app()->currentLocale(), $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for registration');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            //            log here
            Log::error($th->getMessage());
        }
//        report mail for register
        try{

            $to_name = 'Hormatly IFT administratory';

//            $to_email = 'ereshjumayew@gmail.com';
//            $to_email = 'yusuph0206@gmail.com';
//            $to_email = 'info@tmt.tm';
            $to_email = 'tmt.group.web@gmail.com';

            $title = 'IFT new registration report';
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
        return redirect()->back()->with('success', __('ift.Registration sended message'));

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

//        response mail for feedback
//        try{
//
//            $to_name = $request->name. ' '.$request->surname;
//
//            $to_email = $request->email;
//
//            $user_details = "Thank you for feedback ";
//
//            $data1 = array('name'=>$to_name, 'body' => $user_details);
//            Mail::send('mail.feedback_response1', $data1, function($message) use ($to_name, $to_email) {
//                $message->to($to_email, $to_name)
//                    ->subject('Thank you for feedback');
//                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
//            });
//        }
//        catch (\Throwable $th) {
//            //            log here
//            Log::error($th->getMessage());
//        }
//        report mail for feedback
        try{
            $to_name = 'Hormatly IFT administratory';

//            $to_email = 'ereshjumayew@gmail.com';
//            $to_email = 'yusup@ucyap.com';
//            $to_email = 'info@tmt.tm';
            $to_email = 'tmt.group.web@gmail.com';

            $title = 'IFT new feedback report';
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

    public function visa_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birth_date' => 'required|date|before:' . Carbon::now()->subYears(18)->toDateString(),
            'country' => 'required|integer|min:1|max:194',
            'address' => 'required|string|max:255',
            'passport' => 'required|string|max:255',
            'date_issue' => 'required|date|before:' . Carbon::now()->toDateString(),
            'date_expiry' => 'required|date|after:2025-03-20',
            'education' => 'required|string|max:255',
            'education_institute' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'arrival_date' => 'required|date|before:2025-03-20',
            'departure_date' => 'required|date|after:2025-03-20',
            'website' => 'required|url|max:255',
            'hotel' => 'required|integer|min:1|max:3',
            'photo' => 'required|mimes:pdf,jpg,jpeg|max:4096',
            'passport_copy' => 'required|mimes:pdf,jpg,jpeg|max:4096',
            'employment_verification_letter' => 'required|mimes:pdf,jpg,jpeg|max:4096',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $directoryPath = 'files/visa';
        if ( $request->hasFile('photo') ) {

            $image = $this->storeFiles($request->file('photo'), $directoryPath);

        } else {
            $image = null;
        }
        if ( $request->hasFile('passport_copy') ) {

            $passport_copy = $this->storeFiles($request->file('passport_copy'), $directoryPath);

        } else {
            $passport_copy = null;
        }
        if ( $request->hasFile('employment_verification_letter') ) {

            $employment_verification_letter = $this->storeFiles($request->file('employment_verification_letter'), $directoryPath);

        } else {
            $employment_verification_letter = null;
        }


        $data = [
            'name'              => $request->name,
            'surname'               => $request->surname,
            'middle_name'               => $request->middle_name,
            'company_name'              => $request->company_name,
            'job'               => $request->job,
            'email'             => $request->email,
            'birth_date'                => $request->birth_date,
            'country'               => \Helper::getCountryName($request->country),
            'address'               => $request->address,
            'passport'              => $request->passport,
            'date_issue'                => $request->date_issue,
            'date_expiry'               => $request->date_expiry,
            'education'             => $request->education,
            'education_institute'               => $request->education_institute,
            'specialization'                => $request->specialization,
            'purpose'               => $request->purpose,
            'arrival_date'              => $request->arrival_date,
            'departure_date'                => $request->departure_date,
            'website'               => $request->website,
            'hotel'             => \Helper::getHotelName($request->hotel),
            'photo'             => $image,
            'passport_copy'             => $passport_copy,
            'employment_verification_letter'                => $employment_verification_letter,
//            'photo'             => $image,
        ];

        $filePath = resource_path('local_info/visa.json');

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode([$data]));
        } else {
            $jsonData = File::get($filePath);
            $existingData = json_decode($jsonData, true);
            $existingData[] = $data;
            File::put($filePath, json_encode($existingData));
        }

//        response mail for register
        try{

            $to_name = $request->name. ' '. $request->middle_name.' '.$request->surname;

            $to_email = $request->email;

            $user_details = "Thank you for visa registration";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.visa_response1_'.app()->currentLocale(), $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for registration');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            //            log here
            Log::error($th->getMessage());
        }
//        report mail for register
        try{

            $to_name = 'Hormatly IFT administratory';

//            $to_email = 'maslovsaparmyrat@gmail.com';
//            $to_email = 'yusuph0206@gmail.com';
//            $to_email = 'info@tmt.tm';
            $to_email = 'tmt.group.web@gmail.com';

            $title = 'IFT new visa report';
//            $img = $data['photo'];
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
//            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email, $img) {
            Mail::send('mail.visa_report1', $data2, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Taze visa geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
//                if(isset($img)){
//                $message->attach(public_path('/'.$img));
//                }
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('ift.visa sended message'));

    }
}
