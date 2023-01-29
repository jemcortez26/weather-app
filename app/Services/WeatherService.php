<?php

namespace App\Services;

use App\Libraries\TextConstantLib;

/**
 * Class WeatherService
 * @package App\Services
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class WeatherService extends BaseService
{
    /**
     * Method to get Weather data
     * @param $aParams
     * @return array|never|null
     */
    public function getWeather($aParams): ?array
    {
        $aParams[TextConstantLib::APP_ID] = config('app.weather_api');
        $sQuery = http_build_query($aParams);
        $sUri = TextConstantLib::WEATHER_URI . $sQuery;
        return $this->getRequest($sUri);
    }
}
