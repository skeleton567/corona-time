<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command adds countries to database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Country::truncate();

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
        }
    }
}
