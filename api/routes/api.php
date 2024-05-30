<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [UserController::class, 'logout']);
      Route::get('user', [UserController::class, 'user']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {
  Route::get('rooms', [RoomController::class, 'index']);
  Route::post('rooms', [RoomController::class, 'store']);
  Route::get('rooms/{id}', [RoomController::class, 'show']);

  Route::get('bookings', [BookingController::class, 'index']);
  Route::post('bookings', [BookingController::class, 'store']);
  Route::get('bookings/{id}', [BookingController::class, 'show']);
  Route::put('bookings/{id}', [BookingController::class, 'update']);
  Route::delete('bookings/{id}', [BookingController::class, 'destroy']);

  Route::get('customers', [CustomerController::class, 'index']);
  Route::post('customers', [CustomerController::class, 'store']);
  Route::get('customers/{id}', [CustomerController::class, 'show']);

  Route::get('payments', [PaymentController::class, 'index']);
  Route::post('payments', [PaymentController::class, 'store']);
  Route::get('payments/{id}', [PaymentController::class, 'show']);
});
