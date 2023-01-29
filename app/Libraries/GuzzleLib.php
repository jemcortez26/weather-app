<?php

namespace App\Libraries;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


/**
 * Class libGuzzle
 * @package App\Libraries
 */
class GuzzleLib
{
    /**
     * Request in guzzle
     * @param string $sRequestType
     * @param string $sUri
     * @param array  $aRequest
     * @return array
     */
    public static function request(string $sRequestType, string $sUri, array $aRequest = []): ?array
    {
        $sRequestType = strtoupper($sRequestType);
        try {
            $oClient = new Client(['verify' => false]);
            $oResponse = $oClient->request($sRequestType, $sUri, $aRequest);

            return [
                TextConstantLib::BODY    => json_decode($oResponse->getBody()->getContents(), true),
                TextConstantLib::HEADERS => $oResponse->getHeaders()
            ];
        } catch (RequestException $oException) {
            return [
                TextConstantLib::SUCCESS => false,
                TextConstantLib::CODE    => $oException->getCode(),
                TextConstantLib::MESSAGE => $oException->getMessage()
            ];
        }
    }
}
