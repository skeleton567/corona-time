<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordMailingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\UpdatePasswordMailingRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class MailingController extends Controller
{
    //

    public function verify(Request $request): RedirectResponse
    {
        $user = User::find($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect(route('auth.verified'));
    }

    public function forgotPassword(ForgotPasswordMailingRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? redirect(route('reset.notice'))
                    : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset($token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function passwordUpdate(UpdatePasswordMailingRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(null);

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('password.updated')
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
