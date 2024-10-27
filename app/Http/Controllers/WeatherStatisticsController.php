<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\WeatherDate;
use App\Models\Temperature;
use App\Models\Precipitation;
use App\Models\Wind;
use App\Models\Sunlight;
use Illuminate\Http\Request;

class WeatherStatisticsController extends Controller
{
    public function statistics()
    {
        $totalDays = WeatherDate::count();
        $avgTemp = DB::table('temperature')->avg('tavg');
        $totalPrecipitation = DB::table('precipitation')->sum('prcp');
        $maxTemp = DB::table('temperature')->max('tmax');
        $minTemp = DB::table('temperature')->min('tmin');
        $avgPressure = DB::table('pressure')->avg('pres');

        return view('statistics', compact('totalDays', 'avgTemp', 'totalPrecipitation', 'maxTemp', 'minTemp', 'avgPressure'));
    }
}
