<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherDate extends Model
{
    protected $table = 'weather_date';
    protected $primaryKey = 'date';
    public $incrementing = false;
    protected $keyType = 'string';

    public function temperature() {
        return $this->hasOne(Temperature::class, 'date', 'date');
    }

    public function precipitation() {
        return $this->hasOne(Precipitation::class, 'date', 'date');
    }

    public function wind() {
        return $this->hasOne(Wind::class, 'date', 'date');
    }

    public function pressure() {
        return $this->hasOne(AirPressure::class, 'date', 'date');
    }

    public function sunlight() {
        return $this->hasOne(Sunlight::class, 'date', 'date');
    }
}

