<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public route 
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('produk', [ListProdukController::class, 'index']);
Route::get('feedback', [FeedbackController::class, 'index']);

//protected route
Route::middleware('auth:sanctum')->group(function () {
    Route::get('produk/{id}', [ListProdukController::class, 'show']);
    Route::resource('produk', ListProdukController::class)->except('create', 'edit', 'show', 'index');
    
    Route::get('order', [OrderController::class, 'index']);
    Route::get('order/{id}', [OrderController::class, 'show']);
    Route::resource('order', OrderController::class)->except('create', 'edit', 'show', 'index');
    
    Route::get('payment', [PaymentController::class, 'index']);
    Route::get('payment/{id}', [PaymentController::class, 'show']);
    Route::resource('payment', PaymentController::class)->except('create', 'edit', 'show', 'index');

    Route::get('feedback/{id}', [FeedbackController::class, 'show']);
    Route::resource('feedback', FeedbackController::class)->except('create', 'edit', 'show', 'index');
    
    Route::post('logout', [AuthController::class, 'logout']);
});
