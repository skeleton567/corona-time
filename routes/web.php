<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailingController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['language'])->group(function () {
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/country', [DashboardController::class, 'statistics'])->name('dashboard.statistics');
        Route::get('/', [DashboardController::class, 'world'])->name('dashboard.world');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'auth.login')->name('auth.login');
        Route::view('/register', 'auth.register')->name('auth.register');
        Route::view('/email/verify', 'auth.verification-notice')->name('verification.notice');
        Route::view('/reset-password/notice', 'auth.reset-notice')->name('reset.notice');
        Route::view('/email/verified', 'auth.verified')->name('auth.verified');
        Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
        Route::view('/password-updated', 'auth.password-updated')->name('password.updated');
        Route::controller(AuthController::class)->group(function () {
            Route::post('/register', 'register')->name('register');
            Route::post('/login', 'login')->name('login');
            Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        });
        Route::controller(MailingController::class)->group(function () {
            Route::post('/forgot-password', 'forgotPassword')->name('password.email');
            Route::get('/reset-password/{token}', 'passwordReset')->name('password.reset');
            Route::post('/reset-password', 'passwordUpdate')->name('password.update');
        });
    });
});

Route::post('locale/', [LanguageController::class, 'change'])->name('language.change');
