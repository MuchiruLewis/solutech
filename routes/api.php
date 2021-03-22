<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});

    Route::group(['prefix' => 'orders', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('add', [OrderController::class, 'add']);
    Route::get('edit/{id}', [OrderController::class, 'edit']);
    Route::post('update/{id}', [OrderController::class, 'update']);
    Route::delete('delete/{id}', [OrderController::class, 'delete']);
});

Route::group(['prefix' => 'suppliers', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('add', [SupplierController::class, 'add']);
    Route::get('edit/{id}', [SupplierController::class, 'edit']);
    Route::post('update/{id}', [SupplierController::class, 'update']);
    Route::delete('delete/{id}', [SupplierController::class, 'delete']);
});
