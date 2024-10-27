<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Precipitation extends Model
{
    protected $table = 'precipitation';
    protected $fillable = ['date', 'prcp', 'snow'];

    public function weatherDate()
    {
        return $this->belongsTo(WeatherDate::class, 'date', 'date');
    }
}
