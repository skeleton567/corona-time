<?php

namespace Tests\Feature;

use App\Models\CovidStatistic;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_see_dashboard_world_page()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->actingAs($user)->get(route('dashboard.world'))->assertStatus(200);
    }
    public function test_user_can_see_dashboard_statistics_page()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user)->get(route('dashboard.statistics'))->assertStatus(200);
    }
    public function test_guest_cannot_see_dashboard_world_page()
    {
        $this->get(route('dashboard.world'))->assertRedirect(route('auth.login'));
    }
    public function test_guest_cannot_see_dashboard_statistics_page()
    {
        $this->get(route('dashboard.statistics'))->assertRedirect(route('auth.login'));
    }

    public function test_user_can_see_dashboard_world_information()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $newStatistic = CovidStatistic::create([
            'confirmed' => rand(0, 99999),
            'recovered' => rand(0, 99999),
            'deaths' =>  rand(0, 99999),
        ]);

        $newStatistic->setTranslations('country', [
            'en' => 'Worldwide',
            'ka' => 'მსოფლიო',
        ]);
        $newStatistic->save();
        $this->actingAs($user)->get(route('dashboard.world'))
        ->assertSee($newStatistic->confirmed)
        ->assertSee($newStatistic->recovered)
        ->assertSee($newStatistic->deaths);
    }
    public function test_user_can_see_dashboard_statistics_information()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $newStatistic = CovidStatistic::factory()->create();
        $this->actingAs($user)->get(route('dashboard.statistics'))
        ->assertSee($newStatistic->confirmed)
        ->assertSee($newStatistic->recovered)
        ->assertSee($newStatistic->deaths)
        ->assertSee($newStatistic->country);
    }

    public function test_user_can_search_dashboard_statistics_information()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $newStatisticWorld = CovidStatistic::create([
            'confirmed' => rand(0, 99999),
            'recovered' => rand(0, 99999),
            'deaths' =>  rand(0, 99999),
        ]);

        $newStatisticWorld->setTranslations('country', [
            'en' => 'Worldwide',
            'ka' => 'მსოფლიო',
        ]);
        $newStatisticWorld->save();
        $newStatisticCountry = CovidStatistic::factory()->create();

        $this->actingAs($user)->get(route('dashboard.statistics', ['search' => 'Worldwide']))
        ->assertDontSee($newStatisticCountry->country);
    }

    public function test_user_can_sort_dashboard_statistics_information()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $allStatistics = CovidStatistic::factory(2)->create();
        $this->covid_statistics_sort('country', $allStatistics, $user, ['false', 'true']);
        $this->covid_statistics_sort('confirmed', $allStatistics, $user);
        $this->covid_statistics_sort('recovered', $allStatistics, $user);
        $this->covid_statistics_sort('deaths', $allStatistics, $user);
    }

    private function covid_statistics_sort(string $value, Collection $collection, $user, array $direction = ['true', 'false'])
    {
        $response = $this->actingAs($user)->get(route('dashboard.statistics', [$value => $direction[1]]));

        $response->assertViewHas('statistics', function (Collection $statistics) use ($collection, $value) {
            $pos = $statistics->pluck($value)->toArray();

            return $pos ==  $collection->sortBy($value)
            ->pluck($value)
            ->toArray();
        });

        $response = $this->actingAs($user)->get(route('dashboard.statistics', [$value =>  $direction[0]]));

        $response->assertViewHas('statistics', function (Collection $statistics) use ($collection, $value) {
            $pos = $statistics->pluck($value)->toArray();

            return $pos ==  $collection->sortByDesc($value)
            ->pluck($value)
            ->toArray();
        });
    }
}
