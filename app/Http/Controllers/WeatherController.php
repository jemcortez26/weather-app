<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

/**
 * Class WeatherController
 * @package App\Controllers
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class WeatherController
{
    private Request $oRequest;

    private WeatherService $oWeatherService;

    public function __construct(Request $oRequest, WeatherService $oWeatherService)
    {
        $this->oRequest = $oRequest;
        $this->oWeatherService = $oWeatherService;
    }

    public function getWeather()
    {
        $aParams = $this->oRequest->all();
        return response()->json($this->oWeatherService->getWeather($aParams));
    }
}
