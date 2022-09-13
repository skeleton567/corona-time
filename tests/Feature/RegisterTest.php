<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_see_register_page()
    {
        $this->get(route('auth.register'))->assertStatus(200);
    }

    public function test_guest_can_register()
    {
        $this->post(route('register'), [
            'username' => 'User',
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('verification.notice'));

        $this->assertDatabaseHas('users', [
            'username' => 'User',
            'email' => 'user@gh.com',
        ]);
    }

    public function test_register_requires_credentials()
    {
        $this->post(route('register'), [
            'username' => '',
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('username');

        $this->post(route('register'), [
            'username' => 'username',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('email');

        $this->post(route('register'), [
            'username' => 'username',
            'email' => 'user@gh.com',
            'password' => '',
            'password_confirmation' => '',
        ])->assertSessionHasErrors('password');
    }

    public function test_new_username_and_email_should_be_unique()
    {
        $user = User::factory()->create();
        $this->post(route('register'), [
            'username' => $user->username,
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('username');

        $this->post(route('register'), [
            'username' => 'username',
            'email' =>  $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('email');
    }
    public function test_new_username_and_password_should_be_min_3()
    {
        $user = User::factory()->create();
        $this->post(route('register'), [
            'username' => 'ki',
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertSessionHasErrors('username');

        $this->post(route('register'), [
            'username' => 'username',
            'email' => 'user@gh.com',
            'password' => 'ki',
            'password_confirmation' => 'ki',
        ])->assertSessionHasErrors('password');
    }

    public function test_password_should_be_confirmed()
    {
        $this->post(route('register'), [
            'username' => 'username',
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'passwor',
        ])->assertSessionHasErrors('password');
    }
}
