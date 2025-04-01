<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OnboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PendingAppointmentController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RescheduleController;
use App\Http\Controllers\StockController;
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

Route::get('patients/{patient}/history', PatientHistoryController::class)
    ->name('patients.history');

Route::resource('patients', PatientController::class)
    ->except('delete');

Route::resource('doctors', DoctorController::class)
    ->except('show', 'delete');

Route::resource('treatments', TreatmentController::class)
    ->except('show', 'delete');

Route::resource('products', ProductController::class)
    ->except('show', 'delete');

Route::resource('suppliers', SupplierController::class)
    ->except('show', 'delete');

Route::resource('appointments', AppointmentController::class)
    ->except('show');

Route::resource('procedures', ProcedureController::class)
    ->only('index', 'show');

Route::resource('bills', BillController::class)
    ->only('index', 'show');

Route::resource('purchases', PurchaseController::class)
    ->only('create', 'store');

Route::controller(StockController::class)->prefix('stock')->group(function () {
    Route::get('', 'index')->name('stock.index');
    Route::get('history', 'history')->name('stock.history');
});

Route::controller(PendingAppointmentController::class)
    ->prefix('appointments/pending')->as('pending-appointments.')->group(function () {
        Route::get('', 'index')
            ->name('index');

        Route::patch('{appointment}', 'update')
            ->name('update');
    });

Route::patch('appointments/reschedule/{appointment}', RescheduleController::class)
    ->name('reschedule-appointment');

Route::controller(PDFController::class)->prefix('pdf')->as('pdf.')->group(function () {
    Route::get('patients', 'patients')->name('patients');
    Route::get('appointments', 'appointments')->name('appointments');
    Route::get('doctors', 'doctors')->name('doctors');
    Route::get('incomes', 'incomes')->name('incomes');
    Route::get('stock', 'stock')->name('stock');
    Route::get('monthly-appointments', 'monthly')->name('monthly-appointments');
    Route::get('treatments-income', 'treatments')->name('treatments-income');
    Route::get('active-patients', 'active')->name('active-patients');
});

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

Route::view('reports', 'reports')
    ->name('reports');

Route::controller(HelpController::class)
    ->prefix('help')
    ->as('help.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{slug}', 'show')->name('show');
    });
