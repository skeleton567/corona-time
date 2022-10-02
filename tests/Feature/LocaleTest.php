<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_change_locale()
    {
        $this->post(route('language.change'), ['locale' => 'ka'])->assertSessionHas('lang', 'ka')->assertRedirect();
    }

    public function test_user_cannot_set_unsupported_locale()
    {
        $this->post(route('language.change'), ['locale' => 'es'])->assertSessionHas('lang', 'en');
    }
}
