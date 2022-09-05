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

    public function statistics(): View
    {
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
