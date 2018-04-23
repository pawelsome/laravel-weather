<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;

class WeatherController extends Controller
{
    public function getIndex()
    {
        $data = Cache::remember('weather', 60, function () {
            $url = 'http://api.openweathermap.org/data/2.5/forecast?id=756135&APPID=f5ccbbac0ab5899cfab69917d3445f4f&units=metric';
            $json = file_get_contents($url);
            $data = json_decode($json);
            return $data;
        });
        return view('pages.index', ['data' => $data]);
    }
}