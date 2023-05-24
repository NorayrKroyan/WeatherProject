<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Exception;

class WeatherService
{
    public static function getCityWeatherData($lat, $lng)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lng,
            'appid' => env('OPEN_WEATHER_API_KEY'),
            'units' => 'metric'
        ]);

        $data = $response->json();

        if ($response->failed()) {
            throw new Exception('Failed to get weather data');
        }

        return $data;
    }
}
