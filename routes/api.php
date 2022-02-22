<?php

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
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::get('/user', [App\Http\Controllers\API\AuthController::class, 'user']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::get('/get-inventory', [App\Http\Controllers\API\InventoryController::class, 'get']);
    Route::get('/detail-inventory/{id}', [App\Http\Controllers\API\InventoryController::class, 'view']);
    Route::post('/store-inventory', [App\Http\Controllers\API\InventoryController::class, 'store']);
    Route::post('/update-inventory', [App\Http\Controllers\API\InventoryController::class, 'put']);
    
    Route::get('/get-inventory-cat', [App\Http\Controllers\API\InventoryCatController::class, 'get']);
    Route::get('/detail-inventory-cat/{id}', [App\Http\Controllers\API\InventoryCatController::class, 'view']);
    Route::post('/store-inventory-cat', [App\Http\Controllers\API\InventoryCatController::class, 'store']);
    Route::post('/update-inventory-cat', [App\Http\Controllers\API\InventoryCatController::class, 'put']);

    Route::get('/get-income-inventory', [App\Http\Controllers\API\IncomeInventoryController::class, 'get']);
    Route::get('/detail-income-inventory/{id}', [App\Http\Controllers\API\IncomeInventoryController::class, 'view']);
    Route::post('/store-income-inventory', [App\Http\Controllers\API\IncomeInventoryController::class, 'store']);

});