<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Resources\LocationResource;
use Validator;

class LocationController extends Controller
{

    /**
     * ShipmentService $service
     * @var service
     */
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LocationService $service)
    {
        $this->service = $service;
    }
    /**
     *      *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAvailable($date, $schedule)
    {
        $locations = $this->service->getAvailableLocations($date, $schedule);
        return LocationResource::collection($locations);
    }

}
