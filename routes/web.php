<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
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

Route::withoutMiddleware('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
        ->name('login');
    
    Route::post('/login', [LoginController::class, 'store'])
        ->name('auth');
    
    Route::delete('/login', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::get('/register', [PatientController::class, 'create'])
        ->name('register');
});

Route::view('/', 'home');


