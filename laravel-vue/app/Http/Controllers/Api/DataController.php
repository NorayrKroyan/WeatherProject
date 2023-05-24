<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeatherResult;
use App\Service\GeocodingService;
use App\Models\Order;
use App\Service\WeatherService;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getdata() {
        $data = WeatherResult::all();

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function saveData(Request $request)
    {
        $data = $request->all();
        $geoData = GeocodingService::getCoordinates($data['cityName']);
        $weatherData = WeatherService::getCityWeatherData($geoData['lat'], $geoData['lng']);
        try {
            WeatherResult::create(['data' => $weatherData]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }

        return response()->json(['success' => true]);
    }


}
