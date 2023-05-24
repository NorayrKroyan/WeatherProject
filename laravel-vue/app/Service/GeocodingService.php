<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Exception;

class GeocodingService
{
    public static function getCoordinates($city)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $city,
            'key' => env('GOOGLE_MAPS_API_KEY'),
        ]);

        $data = $response->json();

        if ($data['status'] !== 'OK') {
            throw new Exception('Failed to get coordinates');
        }

        $coordinates = $data['results'][0]['geometry']['location'];

        return $coordinates;
    }
}
