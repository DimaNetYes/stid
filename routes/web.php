<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\SecretFileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetTokenController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome');
});

//Route::resource('users', UserController::class);

Route::middleware([])->group(function () {          //'auth', 'verified'
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    Route::resource('articles', ArticleController::class);


    Route::resource('users', UserController::class);
    Route::resource('password-reset-tokens', PasswordResetTokenController::class);
    Route::resource('secrets', SecretController::class);
    Route::resource('secret-files', SecretFileController::class);
});


