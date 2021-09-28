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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/package', [PackageController::class, 'index_package']);
Route::get('/package/{id}', [PackageController::class, 'show_package']);
Route::post('/package', [PackageController::class, 'insert_package']);
Route::put('/package/{id}', [PackageController::class, 'put_package']);
Route::put('/patch/{id}', [PackageController::class, 'patch_package']);
Route::delete('/package/{id}', [PackageController::class, 'delete_package']);

