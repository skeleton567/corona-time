<?php

namespace Tests\Feature;

use App\Console\Commands\GetCovidStatistics;
use App\Console\Kernel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class ConsoleTest extends TestCase
{
    use RefreshDatabase;
    public function test_covid_statistics_can_be_fetched_from_api_and_summed()
    {
        $this->artisan('get:covidStatistics');
        $this->assertDatabaseHas('covid_statistics', [
            'country->en' => 'Afghanistan'
        ]);
        $this->assertDatabaseHas('covid_statistics', [
            'country->en' => 'Zimbabwe'
        ]);
        $this->assertDatabaseHas('covid_statistics', [
            'country->en' => 'Worldwide'
        ]);
    }

    public function test_covid_statistics_fetch_is_scheduled()
    {
        $schedule = $this->app->get(Schedule::class);
        collect($schedule->events())->filter(function (Event $event) {
            return assertTrue(str_contains($event->command, 'get:covidStatistics'));
        });
    }
}
