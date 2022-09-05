<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\CovidStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCovidStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:covidStatistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates covid statistics for the day in database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CovidStatistic::truncate();
        $countries = json_decode(Http::accept('application/json')->get('https://devtest.ge/countries'));

        foreach ($countries as $country) {
            $statistic = json_decode(Http::accept('application/json')->post(
                'https://devtest.ge/get-country-statistics',
                [
                'code' => $country->code
                ]
            ));

            CovidStatistic::create([
                'confirmed' =>  $statistic->confirmed,
                'recovered' => $statistic->recovered,
                'deaths' => $statistic->deaths,
                'country_code' => $statistic->code

            ]);
        }

        CovidStatistic::create([
            'confirmed' => CovidStatistic::sum('confirmed'),
            'recovered' => CovidStatistic::sum('recovered'),
            'deaths' =>  CovidStatistic::sum('deaths'),
            'country_code' => 'WO'

        ]);
    }
}
