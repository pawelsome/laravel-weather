<?php

namespace App\Services;

use Cache;

class WeatherService
{
    public function getWeather()
    {
        $data = Cache::remember('weather', 60, function () {
            $params = [
                'id' => config('weather.city_id'),
                'APPID' => config('weather.key'),
                'units' => config('weather.units'),
            ];
            $query = http_build_query($params);
            $url = "http://api.openweathermap.org/data/2.5/forecast?{$query}";
            $json = file_get_contents($url);
            $data = json_decode($json);
            return $data;
        });
        return $data;
    }
}