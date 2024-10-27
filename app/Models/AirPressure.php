<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirPressure extends Model
{
    protected $table = 'pressure';
    protected $fillable = ['date', 'pres'];

    public function weatherDate()
    {
        return $this->belongsTo(WeatherDate::class, 'date', 'date');
    }
    
}
