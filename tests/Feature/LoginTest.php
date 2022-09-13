<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_login_page()
    {
        $this->get(route('auth.login'))->assertStatus(200);
    }

    public function test_users_can_login_with_username()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->post(route('login'), [
            'username' => $user->username,
            'password' => '12345',
        ])->assertRedirect(route('dashboard.world'));

        $this->assertAuthenticated();
    }

    public function test_users_can_login_with_email()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->post(route('login'), [
            'username' => $user->email,
            'password' => '12345',
        ])->assertRedirect(route('dashboard.world'));

        $this->assertAuthenticated();
    }

    public function test_users_can_not_login_with_invalid_credentials()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();

        $this->post(route('login'), [
            'username' => 'wrong-email',
            'password' => '12345',
        ]);
        $this->assertGuest();

        $this->post(route('login'), [
            'username' => 'wrong-username',
            'password' => '12345',
        ]);
        $this->assertGuest();
    }


    public function test_unverified_users_can_not_login()
    {
        $user = User::factory()->create();

        $this->post(route('login'), [
            'username' => $user->email,
            'password' => '12345',
        ]);

        $this->assertGuest();
    }

    public function test_login_requires_credentials()
    {
        $user = User::factory()->create();

        $this->post(route('login'), [
            'username' => $user->email,
            'password' => '',
        ])->assertSessionHasErrors('password');

        $this->assertGuest();

        $user = User::factory()->create(['username' => '']);

        $this->post(route('login'), [
            'username' => $user->username,
            'password' => '12345',
        ])->assertSessionHasErrors('username');

        $this->assertGuest();

        $user = User::factory()->create(['username' => 'ki']);

        $this->post(route('login'), [
            'username' => $user->username,
            'password' => '12345',
        ])->assertSessionHasErrors('username');

        $this->assertGuest();
    }
}
