<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admins', [AdminsController::class, 'index']);
Route::post('/admins/tambah', [AdminsController::class, 'store']);
Route::post('/admins/update/{id}', [AdminsController::class, 'update']);
Route::get('/admins/detail/{id}', [AdminsController::class, 'show']);
Route::delete('/admins/delete/{id}', [AdminsController::class, 'delete']);

Route::get('/orders', [OrdersController::class, 'index']);
Route::post('/orders/tambah', [OrdersController::class, 'store']);
Route::post('/orders/update/{id}', [OrdersController::class, 'update']);
Route::get('/orders/detail/{id}', [OrdersController::class, 'show']);
Route::delete('/orders/delete/{id}', [OrdersController::class, 'delete']);

Route::get('/customers', [CustomersController::class, 'index']);
Route::post('/customers/tambah', [CustomersController::class, 'store']);
Route::post('/customers/update/{id}', [CustomersController::class, 'update']);
Route::get('/customers/detail/{id}', [CustomersController::class, 'show']);
Route::delete('/customers/delete/{id}', [CustomersController::class, 'delete']);

