<?php

namespace App\Services;

use Cache;

class WeatherService
{
    public function getWeather()
    {
        $data = Cache::remember('weather', 60, function () {
            $url = config('weather.url');
            $json = file_get_contents($url);
            $data = json_decode($json);
            return $data;
        });
        return $data;
    }
}