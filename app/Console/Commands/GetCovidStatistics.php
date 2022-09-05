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
        Country::truncate();
        CovidStatistic::truncate();
        $countries = json_decode(Http::accept('application/json')->get('https://devtest.ge/countries'));
        $newCountry = Country::create([
            'code' => 'WO',
        ]);
        $newCountry->setTranslations('country', [
            'en' => 'Worldwide',
            'ka' => 'მსოფლიო',
        ]);
        $newCountry->save();

        foreach ($countries as $country) {
            $newCountry = Country::create([
                'code' => $country->code,
            ]);
            $newCountry->setTranslations('country', [
                'en' => $country->name->en,
                'ka' => $country->name->ka,
            ]);
            $newCountry->save();

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

        $confirmed = 0;
        $recovered = 0;
        $deaths = 0;
        foreach (CovidStatistic::all() as $statistic) {
            $confirmed += $statistic->confirmed;
            $recovered += $statistic->recovered;
            $deaths += $statistic->deaths;
        }

        CovidStatistic::create([
            'confirmed' =>  $confirmed,
            'recovered' => $recovered,
            'deaths' =>  $deaths,
            'country_code' => 'WO'

        ]);
    }
}
