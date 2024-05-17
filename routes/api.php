<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
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

Route::prefix('user')->group(function () {
    Route::post('', [UserController::class, 'store']);
    Route::get('', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'find']);
    // Route::get('/external/{id}', [UserController::class, 'findExternalUserById']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::prefix('rol')->group(function () {
    Route::get('', [RolController::class, 'index']);
    Route::get('/{id}', [RolController::class, 'find']);
    Route::post('', [RolController::class, 'store']);
    Route::put('/{id}', [RolController::class, 'update']);
    Route::delete('/{id}', [RolController::class, 'destroy']);
});

Route::prefix('permission')->group(function () {
    Route::get('', [PermissionController::class, 'index']);
    Route::get('/{id}', [PermissionController::class, 'find']);
    Route::post('', [PermissionController::class, 'store']);
    Route::put('/{id}', [PermissionController::class, 'update']);
    Route::delete('/{id}', [PermissionController::class, 'destroy']);
});

Route::prefix('auth')->group(function () {
    Route::post('', [AuthController::class, 'login']);
    Route::get('/user', [AuthController::class, 'userProfile'])->middleware('auth:api');
});
