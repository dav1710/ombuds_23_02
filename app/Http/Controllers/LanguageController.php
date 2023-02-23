<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function hash(Request $request) {
        Session::put('hash', $request->input('hash'));
    }

    public function language($locale)
    {
        in_array($locale, ['am', 'en']) ? Session::put('locale', $locale) : Session::put('locale', 'am');
        return Redirect::to(URL::previous() . Session::get('hash'));
    }
}
