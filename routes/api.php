<?php

use App\Models\Product;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', function () {
    return Product::withSum('purchases as stock', 'amount')
        ->having('stock', '>', 0)
        ->get();
})->middleware('auth:sanctum');

Route::get('treatments', function () {
    return Treatment::all();
})->middleware('auth:sanctum');
