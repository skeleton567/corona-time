<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    public function register(RegisterAuthRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect('/');
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


        session()->regenerate();
        return redirect('/');
    }
}
