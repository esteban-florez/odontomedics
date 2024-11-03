<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OnboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::withoutMiddleware('auth')->middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    
    Route::post('/login', [LoginController::class, 'store'])
        ->name('auth');

    Route::delete('/login', [LoginController::class, 'destroy'])
        ->withoutMiddleware('guest')
        ->name('logout');

    Route::get('/register', [RegisterController::class, 'create'])
        ->name('register.create');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');

    Route::controller(OnboardController::class)->group(function () { 
        Route::post('/onboard', 'store')
            ->name('onboard.store');

        Route::delete('/onboard', 'destroy')
            ->name('onboard.destroy');
    });
});

Route::view('/', 'home')->name('home');

Route::resource('patients', PatientController::class);
