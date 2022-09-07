<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register(RegisterAuthRequest $request): RedirectResponse
    {
        $user =User::create($request->validated());
        event(new Registered($user));
        return redirect(route('verification.notice'));
    }

    public function login(LoginAuthRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (filter_var($credentials['username'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'username' => __('text.username_incorect')
                ]);
        }


        auth()->attempt($credentials, (bool)$request->has('remember'));

        if (!Auth::user()->email_verified_at) {
            auth()->logout();
            throw ValidationException::withMessages([
                'username' => 'You should verify your email first'
                ]);
        }
        return redirect(route('dashboard.world'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect(route('login'));
    }
}
