<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CovidStatistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //

    public function statistics(Request $request): View
    {
        if ($request->search) {
            $countries = Country::query()
            ->where('country->ka', 'LIKE', "%{$request->search}%")
            ->orWhere('country->en', 'LIKE', "%{$request->search}%")
            ->orWhere('code', 'LIKE', "%{$request->search}%")
            ->get();

            return view('dashboard.statistics', [
                'countries' => $countries
                ]);
        }
        return view('dashboard.statistics', [
            'countries' => Country::all()
            ]);
    }


    public function world(): View
    {
        return view('dashboard.world', [
            'statistics' => CovidStatistic::where('country_code', 'Wo')->get()
            ]);
    }
}
