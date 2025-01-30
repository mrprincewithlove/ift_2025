<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\FlightForm;
use App\Models\HotelForm;
use App\Models\VisaForm;
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
use Revolution\Google\Sheets\Facades\Sheets;
use App\Models\RegistrationForm;

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
    public function hotel()
    {
        $hotelPrices = \Helper::getHotelPrice();
        $hotels = \Helper::getHotels();
        $countries = \Helper::getCountries();
        return view('front.includes.hotel')->with('countries', $countries)->with('hotels', $hotels)->with('hotelPrices', $hotelPrices);
    }

    public function flight()
    {
        $hotels = \Helper::getHotels();
        $countries = \Helper::getCountries();
        return view('front.includes.flight')->with('countries', $countries)->with('hotels', $hotels);
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

//        spreadsheet write here
        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('register')->append([[
            $this->getNextId() ?? '',
            $request->name ?? '',
            $request->surname ?? '',
            $request->middle_name ?? '',
            $request->company_name ?? '',
            $request->job ?? '',
            \Helper::getCountryName($request->country) ?? '',
            $request->number ?? '',
            $request->emergency_number ?? '',
            $request->email ?? '',
            $request->website ?? '',
            $request->status ?? '',
            $request->visa ?? '',
            ]]);
//            create register here
        $register = RegistrationForm::create([
            'name'                 => $request->name ?? '',
            'surname'              => $request->surname ?? '',
            'middle_name'          => $request->middle_name ?? '',
            'company_name'         => $request->company_name ?? '',
            'job'                  => $request->job ?? '',
            'country'              => \Helper::getCountryName($request->country) ?? '',
            'number'               => $request->number ?? '',
            'emergency_number'     => $request->emergency_number ?? '',
            'email'                => $request->email ?? '',
            'website'              => $request->website ?? '',
            'status'               => $request->status ?? '',
            'visa'                 => $request->visa ?? '',
        ]);


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

//        write to excell
        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('feedback')->append([[
            $request->name ?? '',
            $request->surname ?? '',
            $request->number ?? '',
            $request->email ?? '',
            $request->message ?? '',
        ]]);
//            create form here
        $feedback = FeedbackForm::create([
            'name'                 => $request->name ?? '',
            'surname'              => $request->surname ?? '',
            'number'               => $request->number ?? '',
            'email'                => $request->email ?? '',
            'message'              => $request->message ?? '',
        ]);


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
        return redirect()->back()->with('success', __('ift.Feedback sended successfully'));

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
            'website' => 'nullable|url|max:255',
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


//        write to excell
        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('visa')->append([[
            $request->name ?? '',
            $request->surname ?? '',
            $request->middle_name ?? '',
            $request->company_name ?? '',
            $request->job ?? '',
            $request->email ?? '',
            $request->birth_date ?? '',
            \Helper::getCountryName($request->country) ?? '',
            $request->address ?? '',
            $request->passport ?? '',
            $request->date_issue ?? '',
            $request->date_expiry ?? '',
            $request->education ?? '',
            $request->education_institute ?? '',
            $request->specialization ?? '',
            $request->purpose ?? '',
            $request->arrival_date ?? '',
            $request->departure_date ?? '',
            $request->website ?? '',
            \Helper::getHotelName($request->hotel) ?? '',
            'https://ift.com.tm/'.$image ?? '',
            'https://ift.com.tm/'.$passport_copy ?? '',
            'https://ift.com.tm/'.$employment_verification_letter ?? '',
        ]]);
//            create form here
        $feedback = VisaForm::create([
            'name'                              => $request->name ?? '',
            'surname'                           => $request->surname ?? '',
            'middle_name'                       => $request->middle_name ?? '',
            'company_name'                      => $request->company_name ?? '',
            'job'                               => $request->job ?? '',
            'email'                             => $request->email ?? '',
            'birth_date'                        => $request->birth_date ?? '',
            'country'                           => \Helper::getCountryName($request->country) ?? '',
            'address'                           => $request->address ?? '',
            'passport'                          => $request->passport ?? '',
            'date_issue'                        => $request->date_issue ?? '',
            'date_expiry'                       => $request->date_expiry ?? '',
            'education'                         => $request->education ?? '',
            'education_institute'               => $request->education_institute ?? '',
            'specialization'                    => $request->specialization ?? '',
            'purpose'                           => $request->purpose ?? '',
            'arrival_date'                      => $request->arrival_date ?? '',
            'departure_date'                    => $request->departure_date ?? '',
            'website'                           => $request->website ?? '',
            'hotel'                             => \Helper::getHotelName($request->hotel) ?? '',
            'photo'                             => $image ?? '',
            'passport_copy'                     => $passport_copy ?? '',
            'employment_verification_letter'    => $employment_verification_letter ?? '',
        ]);


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
            $file1 = $data['photo'];
            $file2 = $data['passport_copy'];
            $file3 = $data['employment_verification_letter'];
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
//            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email, $img) {
            Mail::send('mail.visa_report1', $data2, function($message) use ($to_name, $to_email, $file1, $file2, $file3) {
                $message->to($to_email, $to_name)
                    ->subject('Taze visa geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
                if(isset($file1)){
                $message->attach(public_path('/'.$file1));
                }
                if(isset($file2)){
                    $message->attach(public_path('/'.$file2));
                }
                if(isset($file3)){
                    $message->attach(public_path('/'.$file3));
                }
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('ift.visa sended message'));

    }

    public function hotel_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/',
            ],
            'passport' => 'required|string|max:255',
            'hotelSelect' => 'required|integer|min:1|max:3',
            'roomSelect' => 'required|integer|min:1|max:10',
            'in_date' => 'required|date|before:2025-03-20',
            'out_date' => 'required|date|after:2025-03-20',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

//        write to excell
        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('hotel')->append([[
            $request->name ?? '',
            $request->surname ?? '',
            $request->middle_name ?? '',
            $request->company_name ?? '',
            $request->job ?? '',
            $request->email ?? '',
            $request->number ?? '',
            $request->passport ?? '',
            \Helper::getHotelName($request->hotelSelect) ?? '',
            \Helper::getHotelPriceName($request->roomSelect) ?? '',
            $request->in_date ?? '',
            $request->out_date ?? '',
        ]]);
//            create form here
        $hotel = HotelForm::create([
            'name'                              => $request->name ?? '',
            'surname'                           => $request->surname ?? '',
            'middle_name'                       => $request->middle_name ?? '',
            'company_name'                      => $request->company_name ?? '',
            'job'                               => $request->job ?? '',
            'email'                             => $request->email ?? '',
            'number'                            => $request->number ?? '',
            'passport'                          => $request->passport ?? '',
            'hotel'                             => \Helper::getHotelName($request->hotelSelect) ?? '',
            'room'                             => \Helper::getHotelPriceName($request->roomSelect) ?? '',
            'in_date'                           => $request->in_date ?? '',
            'out_date'                          => $request->out_date ?? '',
        ]);

        $data = [
            'name'              => $request->name,
            'surname'               => $request->surname,
            'middle_name'               => $request->middle_name,
            'company_name'              => $request->company_name,
            'job'               => $request->job,
            'email'             => $request->email,
            'number'                => $request->number,
            'passport'              => $request->passport,
            'hotel'             => \Helper::getHotelName($request->hotelSelect),
            'room'             => \Helper::getHotelPriceName($request->roomSelect),
            'in_date'                => $request->in_date,
            'out_date'                => $request->out_date,
        ];

        $filePath = resource_path('local_info/hotel.json');

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

            $user_details = "Thank you for hotel registration";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.hotel.response_'.app()->currentLocale(), $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for hotel registration');
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

            $title = 'IFT new hotel report';
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
//            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email, $img) {
            Mail::send('mail.hotel.report', $data2, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Taze hotel zakaz geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('ift.hotel request sended message'));

    }
    public function flight_send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'emergency_number' => [
                'required',
                'regex:/^\+[0-9]{6,15}$/',
            ],
            'arrival_date' => 'required|date_format:Y-m-d\TH:i|before:2025-03-20',
            'departure_date' => 'required|date_format:Y-m-d\TH:i|after:2025-03-20',
            'ticket' => 'required|mimes:pdf,jpg,jpeg|max:4096',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $directoryPath = 'files/flight';
        if ( $request->hasFile('ticket') ) {

            $ticket = $this->storeFiles($request->file('ticket'), $directoryPath);

        } else {
            $ticket = null;
        }
//        write to excell
        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('flight')->append([[
            $request->name ?? '',
            $request->surname ?? '',
            $request->middle_name ?? '',
            $request->company_name ?? '',
            $request->job ?? '',
            $request->email ?? '',
            $request->emergency_number ?? '',
            str_replace('T', ' ', $request->arrival_date) ?? '',
            str_replace('T', ' ', $request->departure_date) ?? '',
            'https://ift.com.tm/'.$ticket ?? '',
        ]]);
//            create form here
        $hotel = FlightForm::create([
            'name'                              => $request->name ?? '',
            'surname'                           => $request->surname ?? '',
            'middle_name'                       => $request->middle_name ?? '',
            'company_name'                      => $request->company_name ?? '',
            'job'                               => $request->job ?? '',
            'email'                             => $request->email ?? '',
            'emergency_number'                            => $request->emergency_number ?? '',
            'arrival_date'                           =>  $request->arrival_date ?? '',
            'departure_date'                           => $request->departure_date ?? '',
            'ticket'                          => $ticket ?? '',
        ]);


        $data = [
            'name'              => $request->name,
            'surname'               => $request->surname,
            'middle_name'               => $request->middle_name,
            'company_name'              => $request->company_name,
            'job'               => $request->job,
            'email'             => $request->email,
            'emergency_number'                => $request->emergency_number,
            'arrival_date' => str_replace('T', ' ', $request->arrival_date),
            'departure_date' => str_replace('T', ' ', $request->departure_date),
            'ticket'                    => $ticket
        ];
        $filePath = resource_path('local_info/flight.json');

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

            $user_details = "Thank you for flight information";

            $data1 = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.flight.response_'.app()->currentLocale(), $data1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Thank you for flight information');
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
            $ticket_image = $data['ticket'];
            $title = 'IFT new flight information report';
            $data2 = array('name'=>$to_name, 'body' => $data, 'title'=>$title);
//            Mail::send('mail.register_report1', $data2, function($message) use ($to_name, $to_email, $img) {
            Mail::send('mail.flight.report', $data2, function($message) use ($to_name, $to_email, $ticket_image) {
                $message->to($to_email, $to_name)
                    ->subject('Taze flight information geldi');
                $message->from('ift2025turkmenistan@gmail.com', 'IFT administration');
                if(isset($ticket_image)){
                    $message->attach(public_path('/'.$ticket_image));
                }
            });
        }
        catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        return redirect()->back()->with('success', __('ift.flight request sended message'));

    }

}
