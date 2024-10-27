<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WeatherStatisticsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherController::class, 'index']);
Route::get('/statistics', [WeatherStatisticsController::class, 'statistics'])->name('weather.statistics');