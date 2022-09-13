<?php

namespace Tests\Feature;

use App\Models\CovidStatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $newStatisticEngland = CovidStatistic::create([
            'confirmed' => rand(0, 99999),
            'recovered' => rand(0, 99999),
            'deaths' =>  rand(0, 99999),
        ]);

        $newStatisticEngland->setTranslations('country', [
            'en' => 'England',
            'ka' => 'ინგლისი',
        ]);
        $newStatisticEngland->save();
        $this->actingAs($user)->get(route('dashboard.statistics', ['search' => 'Worldwide']))
        ->assertDontSee($newStatisticEngland->country);
    }
}
