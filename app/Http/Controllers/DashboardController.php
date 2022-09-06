<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CovidStatistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //

    public function statistics(Request $request): View
    {
        $countries = Country::with('covidStatistic')
        ->where('country->ka', 'LIKE', "%{$request->search}%")
        ->orWhere('country->en', 'LIKE', "%".ucwords($request->search)."%")
        ->orWhere('code', 'LIKE', "%{$request->search}%")
        ->get();

        if ($request->country) {
            $countries = Config::get('app.locale') === 'en' ? Country::orderBy('country->en', $request->country)->get() : Country::orderBy('country->ka', $request->country)->get();
        } elseif ($request->deaths) {
            $countries = $countries->sortBy('covidStatistic.deaths', 105, json_decode($request->deaths));
        } elseif ($request->confirmed) {
            $countries = $countries->sortBy('covidStatistic.confirmed', 105, json_decode($request->confirmed));
        } elseif ($request->recovered) {
            $countries = $countries->sortBy('covidStatistic.recovered', 105, json_decode($request->recovered));
        }



        return view('dashboard.statistics', [
            'countries' => $countries
            ]);
    }

    public function world(): View
    {
        return view('dashboard.world', [
            'statistics' => CovidStatistic::where('country_code', 'Wo')->get()
            ]);
    }
}
