<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LocalizationController extends Controller
{
    public function index($locale) {
        $availableLocales = ['tm', 'ru', 'en'];
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }
        session()->put('locale', $locale);

        return redirect()->back();
     }
    public function oldIndex($locale) {
        $availableLocales = ['tm', 'ru', 'en'];
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }

        session()->put('locale', $locale);

        URL::defaults(['locale' => $locale]);

        $previousUrl = url()->previous();
        if (str_starts_with($previousUrl, 'http://127.0.0.1:8000/ucp'))
            $newUrl = $previousUrl;
        else
            $newUrl = preg_replace('/\/(en|tm|ru)(\/)?/', '/' . $locale . '/', $previousUrl, 1);

        return redirect($newUrl);
    }
}

