<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table = 'temperature';
    protected $fillable = ['date', 'tavg', 'tmin', 'tmax'];

    public function weatherDate()
    {
        return $this->belongsTo(WeatherDate::class, 'date', 'date');
    }
}
