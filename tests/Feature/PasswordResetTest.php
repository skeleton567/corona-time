<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Notifications\ResetPassword;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_password_reset_page()
    {
        $this->get(route('password.request'))->assertStatus(200);
    }

    public function test_user_can_see_password_reset_message()
    {
        $this->get(route('reset.notice'))->assertStatus(200);
    }

    public function test_user_can_see_password_updated_message()
    {
        $this->get(route('password.updated'))->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.request'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_user_can_see_reset_password_page()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.request'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
            $this->get(route('password.reset', [ 'token' => $notification->token]))->assertStatus(200);
            $mailData = $notification->toMail($user);

            $this->assertStringContainsString("Click this button to recover password", $mailData->render());

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.request'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
            $this->post(route('password.update'), [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ])->assertSessionHasNoErrors();

            return true;
        });
    }

        public function test_password_can_not_be_reset_with_invalid_token()
        {
            Notification::fake();

            $user = User::factory()->create();

            $this->post(route('password.request'), ['email' => $user->email]);

            Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
                $this->post(route('password.update'), [
                    'token' => 'invalid-token',
                    'email' => $user->email,
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ])->assertSessionHasErrors();

                return true;
            });
        }

        public function test_password_reset_requires_email()
        {
            $user = User::factory()->create();

            $this->post(route('password.request'), ['email' => ''])->assertSessionHasErrors('email');
        }


        public function test_password_reset_validates_password()
        {
            Notification::fake();

            $user = User::factory()->create();

            $this->post(route('password.request'), ['email' => $user->email]);

            Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
                $this->post(route('password.update'), [
                    'token' => $notification->token,
                    'email' => $user->email,
                    'password' => '',
                    'password_confirmation' => 'password',
                ])->assertSessionHasErrors('password');

                return true;
            });

            Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
                $this->post(route('password.update'), [
                    'token' => $notification->token,
                    'email' => $user->email,
                    'password' => '',
                    'password_confirmation' => '',
                ])->assertSessionHasErrors('password');

                return true;
            });

            Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user): bool {
                $this->post(route('password.update'), [
                    'token' => $notification->token,
                    'email' => $user->email,
                    'password' => 'ki',
                    'password_confirmation' => 'ki',
                ])->assertSessionHasErrors('password');

                return true;
            });
        }
}
