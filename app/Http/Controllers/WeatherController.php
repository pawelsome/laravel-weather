<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getIndex()
    {
        $data = $this->weatherService->getWeather();
        return view('pages.index', compact('data'));
    }
}