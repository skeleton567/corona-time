<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordMailingRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdatePasswordMailingRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Facades\Password;

class MailingController extends Controller
{
    //

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
