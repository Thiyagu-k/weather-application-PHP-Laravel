<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherController;

Route::get('/', [WeatherController::class, 'index']);
Route::post('/get-weather', [WeatherController::class, 'getWeather'])->name('getWeather');
