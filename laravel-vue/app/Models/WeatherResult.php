<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
