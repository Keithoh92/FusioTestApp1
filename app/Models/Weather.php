<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    protected $table = 'fusiotestapp.weather';
    protected $fillable = [
        'id',
        'location',
        'date',
        'min_temp',
        'max_temp',
        'wind_speed',
        'wind_dir',
        'wind_speed_night',
        'wind_dir_night'
    ];

    protected $primaryKey = 'forecast_id';
}
