<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function change(Request $request): RedirectResponse
    {
        if (in_array($request->locale, config('app.available_locales'))) {
            session()->put('lang', $request->locale);
        } else {
            session()->put('lang', 'en');
        }
        return redirect()->back();
    }
}
