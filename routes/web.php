<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OnboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PendingAppointmentController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RescheduleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TreatmentController;
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
    Route::get('login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginController::class, 'store'])
        ->name('auth');

    Route::delete('login', [LoginController::class, 'destroy'])
        ->withoutMiddleware('guest')
        ->name('logout');

    Route::get('register', [RegisterController::class, 'create'])
        ->name('register.create');

    Route::post('register', [RegisterController::class, 'store'])
        ->name('register.store');

    Route::controller(OnboardController::class)->group(function () {
        Route::post('onboard', 'store')
            ->name('onboard.store');

        Route::delete('onboard', 'destroy')
            ->name('onboard.destroy');
    });
});

Route::get('', HomeController::class)->name('home');

Route::get('patients/pdf', [PatientController::class, 'pdf'])
    ->name('patients.pdf');

Route::get('patients/{patient}/history', PatientHistoryController::class)
    ->name('patients.history');

Route::resource('patients', PatientController::class)
    ->except('delete');

Route::get('doctors/pdf', [DoctorController::class, 'pdf'])
    ->name('doctors.pdf');

Route::resource('doctors', controller: DoctorController::class)
    ->except('show', 'delete');

Route::resource('treatments', TreatmentController::class)
    ->except('show', 'delete');

Route::resource('products', ProductController::class)
    ->except('show', 'delete');

Route::resource('suppliers', SupplierController::class)
    ->except('show', 'delete');

Route::get('appointments/pdf', [AppointmentController::class, 'pdf'])
    ->name('appointments.pdf');

Route::resource('appointments', AppointmentController::class)
    ->except('show');

Route::resource('procedures', ProcedureController::class)
    ->only('index', 'show');

Route::resource('bills', BillController::class)
    ->only('index', 'show');

Route::resource('purchases', PurchaseController::class)
    ->only('create', 'store');

Route::controller(PendingAppointmentController::class)->group(function () {
    Route::get('appointments/pending', 'index')
        ->name('pending-appointments.index');

    Route::patch('appointments/pending/{appointment}', 'update')
        ->name('pending-appointments.update');
});

Route::patch('appointments/reschedule/{appointment}', RescheduleController::class)
    ->name('reschedule-appointment');

Route::post('notifications', NotificationController::class)
    ->name('notifications');

Route::controller(BackupController::class)
    ->group(function () {
        Route::get('backups', 'index')->name('backups.index');
        Route::get('backups/create', 'create')->name('backups.create');
        Route::get('backups/{id}', 'download')->name('backups.download');
        Route::get('backups/{id}/delete', 'delete')->name('backups.delete');
        Route::patch('backups/{id}/restore', 'restore')->name('backups.restore');
    });
