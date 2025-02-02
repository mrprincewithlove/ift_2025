<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Agreement;
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
    
}
