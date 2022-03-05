<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function language( string $language){
        try {
            if (in_array($language, explode('|', env('APP_LANGS')))) {
                Session::put('locale', $language);
                App::setlocale($language);
                return redirect()->back();
            }
            return redirect('/');
        } catch (\Exception $exception) {
            return redirect('/');
        }
    }
}
