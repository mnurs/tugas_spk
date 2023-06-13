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




Route::resource('bobots', App\Http\Controllers\API\BobotAPIController::class)
    ->except(['create', 'edit']);

Route::resource('wisatas', App\Http\Controllers\API\WisataAPIController::class)
    ->except(['create', 'edit']);

Route::resource('hotels', App\Http\Controllers\API\HotelAPIController::class)
    ->except(['create', 'edit']);

Route::resource('hotel-datas', App\Http\Controllers\API\HotelDataAPIController::class)
    ->except(['create', 'edit']);