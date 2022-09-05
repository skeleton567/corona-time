<?php

use App\Http\Controllers\AuthController;
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

Route::view('/login', 'auth.login')->name('auth.login');
Route::view('/register', 'auth.register')->name('auth.register');
Route::view('/email/verify', 'auth.verification-notice')->name('verification.notice');
Route::view('/email/verified', 'auth.verified')->name('auth.verified');

Route::get('/email/verify/{id}/{hash}', [MailingController::class, 'verify'])->name('verification.verify');



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
