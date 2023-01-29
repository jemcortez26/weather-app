<?php

namespace App\Http\Controllers;

use App\Services\VenueService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class VenueController
 * @package App\Controllers
 * @author Jesumar B. Cortez <jesumarcortez@gmail.com>
 * @since 01/30/2023
 */
class VenueController
{
    /**
     * @var Request $oRequest
     */
    private Request $oRequest;

    /**
     * @var VenueService $oVenueService
     */
    private VenueService $oVenueService;

    /**
     * VenueController constructor
     * @param Request      $oRequest
     * @param VenueService $oVenueService
     */
    public function __construct(Request $oRequest, VenueService $oVenueService)
    {
        $this->oRequest = $oRequest;
        $this->oVenueService = $oVenueService;
    }

    /**
     * Controller method to receive get venue requests
     * @return JsonResponse
     */
    public function getVenue(): JsonResponse
    {
        $aParams = $this->oRequest->all();
        return response()->json($this->oVenueService->getVenue($aParams));
    }
}
