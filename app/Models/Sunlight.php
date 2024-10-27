<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sunlight extends Model
{
    protected $table = 'sunlight';
    protected $fillable = ['date', 'tsun'];

    public function weatherDate()
    {
        return $this->belongsTo(WeatherDate::class, 'date', 'date');
    }
}
