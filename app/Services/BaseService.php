<?php

namespace App\Services;

use App\Libraries\GuzzleLib;
use App\Libraries\TextConstantLib;

/**
 * Class BaseService
 * @package App\Services
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class BaseService
{
    /**
     * @var GuzzleLib $oGuzzleLib
     */
    private GuzzleLib $oGuzzleLib;

    /**
     * @param GuzzleLib $oGuzzleLib
     */
    public function __construct(GuzzleLib $oGuzzleLib)
    {
        $this->oGuzzleLib = $oGuzzleLib;
    }

    /**
     * Method to execute get request
     * @param String $sUri
     * @param array  $aRequestBody
     * @return array|never|null
     */
    protected function getRequest(string $sUri, array $aRequestBody = [])
    {
        $aHeaders = $this->createHeaders();
        $aRequestBody[TextConstantLib::HEADERS] = $aHeaders;
        $aResponse = $this->oGuzzleLib::request(TextConstantLib::GET, $sUri, $aRequestBody);

        return array_key_exists(TextConstantLib::CODE, $aResponse) === true ? $this->throwException() : $aResponse[TextConstantLib::BODY];
    }

    /**
     * Method to create headers
     * @return array
     */
    private function createHeaders()
    {
        return [
            TextConstantLib::AUTH => config('app.foursquare_key')
        ];
    }

    /**
     * @return never
     */
    private function throwException()
    {
        return abort(500);
    }
}
