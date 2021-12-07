<?php

use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ManagerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'franchises'], function () {
    Route::get('/', [FranchiseController::class, 'index']);
    Route::get('/{id}', [FranchiseController::class, 'show']);
    Route::post('/', [FranchiseController::class, 'store']);
    Route::put('/{id}', [FranchiseController::class, 'update']);
    Route::delete('/{id}', [FranchiseController::class, 'destroy']);
});



Route::group(['prefix' => 'employees'], function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::put('/{id}', [EmployeeController::class, 'update']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/', [FoodController::class, 'index']);
    Route::get('/{id}', [FoodController::class, 'show']);
    Route::post('/', [FoodController::class, 'store']);
    Route::put('/{id}', [FoodController::class, 'update']);
    Route::delete('/{id}', [FoodController::class, 'destroy']);
});

Route::group(['prefix' => 'suppliers'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

Route::group(['prefix' => 'managers'], function () {
    Route::get('/', [ManagerController::class, 'index']);
    Route::get('/{id}', [ManagerController::class, 'show']);
    Route::post('/', [ManagerController::class, 'store']);
    Route::put('/{id}', [ManagerController::class, 'update']);
    Route::delete('/{id}', [ManagerController::class, 'destroy']);
});
