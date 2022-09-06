<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/country', [DashboardController::class, 'statistics'])->name('dashboard.statistics');
    Route::get('/', [DashboardController::class, 'world'])->name('dashboard.world');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'auth.login')->name('auth.login');
    Route::view('/register', 'auth.register')->name('auth.register');
    Route::view('/email/verify', 'auth.verification-notice')->name('verification.notice');
    Route::view('/email/verified', 'auth.verified')->name('auth.verified');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/email/verify/{id}/{hash}', [MailingController::class, 'verify'])->name('verification.verify');
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [MailingController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [MailingController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [MailingController::class, 'passwordUpdate'])->name('password.update');
    Route::view('/password-updated', 'auth.password-updated')->name('password.updated');
});
