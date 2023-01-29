<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\WeatherController;

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

Route::get('/', [IndexController::class, 'viewIndex']);
Route::get('/venues', [VenueController::class, 'getVenue']);
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/error', function() {
    abort(500);
});
