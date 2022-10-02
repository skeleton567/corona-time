<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class ConsoleTest extends TestCase
{
    use RefreshDatabase;
    public function test_covid_statistics_can_be_fetched_from_api_and_summed()
    {
        Http::fake(['https://devtest.ge/countries' => json_decode(file_get_contents('./public/countries.json'), true)]);
        Http::fake(['https://devtest.ge/get-country-statistics' => json_decode(file_get_contents('./public/statistic.json'), true)]);

        $this->artisan('get:covidStatistics')
        ->expectsOutput('Statistics were fetched seccesfully!')
        ->assertExitCode(0);
    }

    public function test_covid_statistics_fetch_is_scheduled()
    {
        $schedule = $this->app->get(Schedule::class);
        collect($schedule->events())->filter(function (Event $event) {
            return assertTrue(str_contains($event->command, 'get:covidStatistics'));
        });
    }
}
