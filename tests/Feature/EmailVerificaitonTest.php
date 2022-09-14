<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifyEmail;

class EmailVerificaitonTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_email_verification_message()
    {
        $this->get(route('verification.notice'))->assertStatus(200);
    }

    public function test_user_can_see_email_verified_message()
    {
        $this->get(route('auth.verified'))->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        $user = User::factory()->create();
        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $this->get($verificationUrl)->assertRedirect(route('auth.verified'));
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $user = User::factory()->create();
        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->get($verificationUrl);
        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }

    public function test_email_verification_link_is_sent()
    {
        Notification::fake();

        $this->post(route('register'), [
            'username' => 'User',
            'email' => 'user@gh.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $user = User::find(1);
        Notification::assertSentTo($user, VerifyEmail::class, function ($notification, $channels) use ($user): bool {
            $mailData = $notification->toMail($user);
            $this->assertStringContainsString("Click this button to confirm your email", $mailData->render());
            return true;
        });
    }
}
