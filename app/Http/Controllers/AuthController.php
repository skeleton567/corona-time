<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function register(RegisterAuthRequest $request): RedirectResponse
    {
        $user = $request->validated();
        $user['password'] = bcrypt($request->validated()['password']);
        User::create($user);

        return redirect('/');
    }
}
