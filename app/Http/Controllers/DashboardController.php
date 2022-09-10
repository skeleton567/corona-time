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
        $statistics =CovidStatistic::query()
        ->where('country->ka', 'LIKE', "%{$request->search}%")
        ->orWhere('country->en', 'LIKE', "%".ucwords($request->search)."%")
        ->orderBy('confirmed', 'desc')
        ->get();

        if ($request->country) {
            $statistics = $statistics->sortBy('country', CovidStatistic::count(), json_decode($request->country))->reverse();
        } elseif ($request->deaths) {
            $statistics = $statistics->sortBy('deaths', CovidStatistic::count(), json_decode($request->deaths));
        } elseif ($request->confirmed) {
            $statistics = $statistics->sortBy('confirmed', CovidStatistic::count(), json_decode($request->confirmed));
        } elseif ($request->recovered) {
            $statistics = $statistics->sortBy('recovered', CovidStatistic::count(), json_decode($request->recovered));
        }

        return view('dashboard.statistics', [
            'statistics' =>  $statistics
            ]);
    }

    public function world(): View
    {
        return view('dashboard.world', [
            'statistics' => CovidStatistic::where('country->en', 'Worldwide')->get()
            ]);
    }
}
