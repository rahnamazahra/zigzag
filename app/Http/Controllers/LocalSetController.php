<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalSetController extends Controller
{
    public function setLocale($lang): RedirectResponse
    {
        if (!in_array($lang, ['en', 'fa'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}
