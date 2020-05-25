<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class changeLanguageController extends Controller
{
    public function changeLanguage($language)
    {
        
        /*
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }*/
        \Session::put('lang', $language);
        return redirect()->back();
    }
}
