<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wind extends Model
{
    protected $table = 'wind';
    protected $fillable = ['date', 'wdir', 'wspd', 'wpgt'];

    public function weatherDate()
    {
        return $this->belongsTo(WeatherDate::class, 'date', 'date');
    }
}
