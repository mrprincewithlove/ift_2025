<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Agreement;
use App\Models\FeedbackForm;
use App\Models\HotelForm;
use App\Models\RegistrationForm;
use App\Models\VisaForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Company;
use App\Models\Worker;
use App\Models\Vacancy;
use App\Models\Cv;
use App\Models\User;
use App\Models\Tariff;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /**
     * private filter function
     * @return Account model
     */


    public function index(Request $request)
    {
        $page = [ 'Home' ];
        return view('admin.home', compact('page'));
    }

    public function test()
    {
        try{

            $to_name = 'Saparmyrat';

            $to_email = 'yusuph0206@gmail.com';

            $user_details = "dizayn yasap beray baranda sorap gor";

            $data = array('name'=>$to_name, 'body' => $user_details);
            Mail::send('mail.verification', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Bu bir test gmail-den mail ugradylyshy');
                $message->from('maslovsaparmyrat@gmail.com', 'Maslow Saparmyrat');
            });
        }
        catch (\Throwable $th) {
            dump($th->getMessage());
        }

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function working_with_excell()
    {

//        $filePath = resource_path('local_info/hotel.json');
//
//        if (!File::exists($filePath)) {
//            return 1;
//        }
//        $jsonData = File::get($filePath);
//        $existingData = json_decode($jsonData, true);
//        $data_to_export = [];
//        foreach ($existingData as $existing) {
//            $form = HotelForm::create([
//                'name'                              => $existing['name'] ?? '',
//                'surname'                           => $existing['surname'] ?? '',
//                'middle_name'                       => $existing['middle_name'] ?? '',
//                'company_name'                      => $existing['company_name'] ?? '',
//                'job'                               => $existing['job'] ?? '',
//                'email'                             => $existing['email'] ?? '',
//                'number'                            => $existing['number'] ?? '',
//                'passport'                          => $existing['passport'] ?? '',
//                'hotel'                             => $existing['hotel'] ?? '',
//                'in_date'                           => $existing['in_date'] ?? '',
//                'out_date'                          => $existing['out_date'] ?? '',
//
//            ]);
//            Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('hotel')->append([[
//                $existing['name'] ?? '',
//                $existing['surname'] ?? '',
//                $existing['middle_name'] ?? '',
//                $existing['company_name'] ?? '',
//                $existing['job'] ?? '',
//                $existing['email'] ?? '',
//                $existing['number'] ?? '',
//                $existing['passport'] ?? '',
//                $existing['hotel'] ?? '',
//                $existing['in_date'] ?? '',
//                $existing['out_date'] ?? '',
//                ]]);
//        }
//
//        dump($data_to_export);
//        dd($existingData);


        $values = Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('test1')->get();
        $header = $values->pull(0);
        $values = Sheets::collection( $header, $values);
        $data = $values->toArray();
//        dd($data);

        Sheets::spreadsheet('1AJahI4bSxV7JXe9TaqGdeZ_adTPR3miP0p67OSBLF50')->sheet('test1')->append([['7', '1234', '1t@mail.ru'], ['8', '4567', '45t@mail.ru']]);
        $new_data = Sheets::all();
        dd($new_data);
    }
}
