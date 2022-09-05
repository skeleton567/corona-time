<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::view('/login', 'auth.login')->name('auth.login');
Route::view('/register', 'auth.register')->name('auth.register');
Route::get('/country', [DashboardController::class, 'statistics'])->name('dashboard.statistics');
Route::get('/', [DashboardController::class, 'world'])->name('dashboard.world');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
