<?php

namespace App\Services;

use App\Libraries\TextConstantLib;

/**
 * Class VenueService
 * @package App\Services
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class VenueService extends BaseService
{
    /**
     * Method to retrieve venues data
     * @param array $aParams
     * @return array|never|null
     */
    public function getVenue(array $aParams)
    {
        $sQuery = http_build_query($aParams);
        $sUri = TextConstantLib::FOURSQUARE_URI . $sQuery;

        return $this->getRequest($sUri);
    }
}
