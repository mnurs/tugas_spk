<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('bobots', App\Http\Controllers\BobotController::class);
Route::resource('wisatas', App\Http\Controllers\WisataController::class);
Route::resource('hotels', App\Http\Controllers\HotelController::class);
Route::post('hotelKandidat/asumsi', [
    'as' => 'asumsiHotelKandidat',
    'uses' => 'HotelKandidatController@generateAsumsi'
]); 
Route::resource('hotelDatas', App\Http\Controllers\HotelDataController::class);
Route::resource('hotelKandidats', App\Http\Controllers\HotelKandidatController::class);
Route::resource('wisataDatas', App\Http\Controllers\WisataDataController::class);
Route::post('wisataKandidat/asumsi', [
    'as' => 'asumsiWisataKandidat',
    'uses' => 'WisataKandidatController@generateAsumsi'
]); 
Route::resource('wisataKandidats', App\Http\Controllers\WisataKandidatController::class);