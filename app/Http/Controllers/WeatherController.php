<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherDate;
use App\Models\Temperature;
use App\Models\Precipitation;
use App\Models\Wind;
use App\Models\Pressure;
use App\Models\Sunlight;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = WeatherDate::with([
            'temperature',
            'precipitation',
            'wind',
            'pressure',
            'sunlight'
        ])->paginate(25);

        return view('weather.index', compact('weatherData'));
    }
}
